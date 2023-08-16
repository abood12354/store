<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\Product_Card_1;
use Illuminate\Http\Request;


class Product_CardController extends Controller
{
    // private $product_card_1;    
    // public function __construct()
    // {
    //     $product_card_1=new Product_Card_1;
    // }

    public function index()
    {
        $products = Product::take(6)->get();
        //$products=$this->product_card_1->get_all_product();
        return view('Sections.Index.Product-Style-part-one' , compact('products'));
    }

}