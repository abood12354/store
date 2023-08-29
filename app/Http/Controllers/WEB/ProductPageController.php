<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CmsPage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index1(string $id){
        $getCategories=Category::getCategories();
        $cmsPages= CmsPage::where('status',1)->get()->toArray();
        $product=Product::findorFail($id);
        return view('Page.product-details-page',compact('product','getCategories','cmsPages'));
    }
}
