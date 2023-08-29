<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CmsPage;
use Illuminate\Http\Request;

class CmsFrontController extends Controller
{
    public function cmsPage(){
        $getCategories=Category::getCategories();
        $cmsPages= CmsPage::where('status',1)->get()->toArray();
     $currentRoute= url()->current(); 
    $currentRoute=str_replace("http://127.0.0.1:8000/","",$currentRoute);
    $cmsRoutes= CmsPage::where('status',1)->get()->pluck('url')->toArray();
        
    if(in_array($currentRoute,$cmsRoutes)){
        $cmsPageDetalis=CmsPage::where('url',$currentRoute)->first()->toArray();
        return view('page.cms_page',compact('cmsPageDetalis','cmsPages','getCategories'));
    }else{
        abort('404');
    }

    }
}
