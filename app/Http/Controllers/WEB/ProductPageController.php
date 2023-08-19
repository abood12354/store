<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(string $id){
        $product=Product::findorFail($id);
        return view('Page.product-details-page',compact('product'));
    }
}
