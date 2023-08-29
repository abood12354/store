<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Admin;
use App\Models\AdminsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{

    public function categories(){
       
       
    }
    public function index()
    {
        $categories=Category::with('parentcategory')->get()->toArray();
         //set subadmin premission for categories pages
         $categoriesModule=array();
         $categoriesModuleCount=AdminsRule::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'categories'])
         ->count();
         $admin=Admin::where('user_id',Auth::guard('admin')->user()->id)->first();
         if($admin['type']=='superadmin'){
             $categoriesModule['view_access']=1;
             $categoriesModule['edit_access']=1;
             $categoriesModule['full_access']=1;
         }else if($categoriesModuleCount==0){
             $message="You don't have premission to use this feature";
           
            //return back()->withInput()->with('error', $message)->route('dashboard');
            Session::put('error',$message);
 
            return Redirect::back();
         }//there's some premissions
         else{
 
             $categoriesModule=AdminsRule::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'categories'])
             ->first()->toArray();
             
 
         }
 
 

         
         
         return view('dashboard.admin.pages.categories')->with(compact('categories','categoriesModule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        $getCategories=Category::getCategories();
        if($id==""){
            $title="Add Category";
            $category=new Category();
            $message="Category added secessfully";
            
            // When creating new category
            $rules = [

                'category_name' => 'required|unique:categories,category_name',
                'url' => 'required|unique:categories,url',
                'description' => 'required',
                'parent_id' => 'required',
                'category_discount'=>'required'
              ];
        }else{
            $title="Edit Category";
            $category = Category::find($id);
            $message="Category updated secessfully";
            
            $rules = [  
                'category_name' => 'required|unique:categories,category_name,' . $id,
                'url' => 'required|unique:categories,url,' . $id,
                'description' => 'required',
                'parent_id' => 'required',
                'category_discount'=>'required'
              ];

        }
        if($request->isMethod('post')){
            $data=$request->all();
            
           // dd($data);
            //Category valdition

            $this->validate($request,$rules);
              //   $this->validate($request,$rules);
                 //echo "<pre>"; print_r($data);die;
                 $category->category_name=$data['category_name'];
                $category->parent_id=$data['parent_id'];
                $category->url=$data['url'];
                $category->description=$data['description'];
                $category->category_discount=$data['category_discount'];
               
                $category->status=1;
                $category->save();
                Session::put('success_message',$message);
                return redirect('categories');

        }
        return view('dashboard.admin.pages.add_edit_category')->with(compact('title','category','getCategories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
            
            if($data['status']=="Active"){
                $status =0;
            }else{
                $status=1;
            }
           
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete
        Category::where('id',$id)->delete();
        Session::put('success_message','Category Has been deleted!');

        return redirect()->back();
    }
}
