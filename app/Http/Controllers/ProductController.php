<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Admin;
use App\Models\AdminsRule;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::get()->toArray();
       



        
        
        return view('dashboard.admin.pages.products')->with(compact('products'));
   
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
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
            $title="Add Product";
            $product=new Product();
            $message="Product added secessfully";
            
            // When creating new category
            $rules = [

                'name' => 'required|unique:products,name',
                'price' => 'required',
                'sell' => 'required',
                'quantity'=>'required',
                'catagory_id'=>'required'
              ];
        }else{
            $title="Edit Product";
            $product = Product::find($id);
            $message="Product updated secessfully";
            
            $rules = [  
                'name' => 'required|unique:products,name,' . $id,
                'price' => 'required',
                'sell' => 'required',
                'quantity'=>'required',
                'catagory_id'=>'required'
              ];

        }
        if($request->isMethod('post')){
            $data=$request->all();
            
           // dd($data);
            //Category valdition

            $this->validate($request,$rules);
              //   $this->validate($request,$rules);
                 //echo "<pre>"; print_r($data);die;
                 $product->name=$data['name'];
                $product->catagory_id=$data['catagory_id'];
                $product->sell=$data['sell'];
                $product->price=$data['price'];
                $product->quantity=$data['quantity'];
                $product->admin_id=Admin::where('user_id',Auth::guard('admin')->user()->id)->first()->id;
                $product->status=1;
                $product->save();
                Session::put('success_message',$message);
                return redirect('products');

        }
        return view('dashboard.admin.pages.add_edit_product')->with(compact('title','product','getCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   $name= Product::where('id',$id)->first()->name;
        Product::where('id',$id)->delete();
        Session::put('success_message',$name.' Has been deleted!');

        return redirect()->back();
    }
}
