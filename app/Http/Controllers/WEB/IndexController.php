<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::take(6)->get();
        return view('Page.index' , compact('products'));
    }


    public function search(Request $request){

        if($request->search){
        $search=$request->search;
        $products=Product::where(function($query) use ($search){
            $query->where('name',"=",$search)
            ->orWhere('status',"=",$search);
        })
        // ->orWhereHas()
->get();
return view('Page.product-details-page',compact('products','search'));
    }
}

}
