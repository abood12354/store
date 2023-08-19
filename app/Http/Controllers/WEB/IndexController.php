<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\View\Components\product as ComponentsProduct;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::take(6)->get();
        return view('Page.index' , compact('products'));
    }


    public function search(Request $request){

        $pro=Product::all();
        // if(!($request->input('search')==null)){
        // $search=$request->search;
        // $products=Product::where(function($query) use ($search,$pro){
        //     // foreach ( $pro as $prod) {
        //         $query->where('name','=',"$search");
        // })->get();
        $search = request()->search;
        $products = Product::query();
        // $products->when(request()->filled('search'), function ($query,$search) {
            // $search = request()->search;
            // $query->where("name", '='  , $search );
                // ->orWhere("bio", 'LIKE', '%' . $search . '%');
        // });
        $products->when(request()->filled('name'), function ($query,$search) {
            $query->where('name', $search);
        });

//         $query->where("name", 'LIKE', '%' . $search . '%')
//         ->orWhere("bio", 'LIKE', '%' . $search . '%');
// });
// $users->when(request()->filled('name'), function ($query) {
//     $query->where('name', request()->name);
// });


        // ->orWhereHas()
//         foreach ( $pro as $prod) {
//  if($search==$prod){
    return view('Page.product-details-page',compact('products','search'));

//  }
//         }
// return view('Page.product-details-page',compact('products','search'));
    }
}

//  }
