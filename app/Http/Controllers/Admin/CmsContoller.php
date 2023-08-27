<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Admin as Admin1;


use App\Models\AdminsRule;
use App\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CmsContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $cmsPages=CmsPage::get()->toArray();

        //set subadmin premission for cms pages
        $pageModule=array();
        $cmcpagesModuleCount=AdminsRule::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'cms_pages'])
        ->count();
        $admin=Admin1::where('user_id',Auth::guard('admin')->user()->id)->first();
        if($admin['type']=='superadmin'){
            $pageModule['view_access']=1;
            $pageModule['edit_access']=1;
            $pageModule['full_access']=1;
        }else if($cmcpagesModuleCount==0){
            $message="You don't have premission to use this feature";
          
           //return back()->withInput()->with('error', $message)->route('dashboard');
           return Redirect::back()->with('error', $message);
        }//there's some premissions
        else{

            $pageModule=AdminsRule::where(['admin_id'=>Auth::guard('admin')->user()->id,'module'=>'cms_pages'])
            ->first()->toArray();
            

        }




        return view('dashboard.admin.pages.cms_pages')->with(compact('cmsPages','pageModule'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id=null)
    {
        if($id==""){
            $title="Add CMS page";
            $cmsPage=new CmsPage;
            $message="CMS Page added secessfully";
        }else{
            $title="Edit CMS Page";
            $cmsPage = CmsPage::find($id);
            $message="CMS Page updated secessfully";
        }
        if($request->isMethod('post')){
            $data=$request->all();
            

            //cms valdition

            $rules=[
                'title'=>'required',
                'url'=>'required',
                'description'=>'required'
            ];
            
                 $this->validate($request,$rules);
                 //echo "<pre>"; print_r($data);die;
                $cmsPage->title=$data['title'];
                $cmsPage->url=$data['url'];
                $cmsPage->description=$data['description'];
                $cmsPage->meta_title=$data['meta_title'];
                $cmsPage->meta_description=$data['meta_description'];
                $cmsPage->meta_keywords=$data['meta_keywords'];
                $cmsPage->status=1;
                $cmsPage->save();
                return redirect('cms-pages')->with('success_message',$message);

        }
        return view('dashboard.admin.pages.add_edit_cms_page')->with(compact('title','cmsPage'));
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
           
            CmsPage::where('id',$data['page_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'page_id'=>$data['page_id']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete
        CmsPage::where('id',$id)->delete();
        return redirect()->back()->with('success_message','CMS Page Has been deleted!');
    }
}
