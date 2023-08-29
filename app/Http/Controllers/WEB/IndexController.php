<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Category;
use App\Models\CmsPage;

use App\Models\Product;
use App\Models\User;
use App\View\Components\product as ComponentsProduct;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IndexController extends Controller
{

    public function index()

    {
        $products = Product::with('Media')->take(6)->get();
        $products2 = Product::with('Media')->skip(6)->take(6)->get();
        $cmsPages= CmsPage::where('status',1)->get()->toArray();
        $getCategories=Category::getCategories();
        //dd($getCategories);
        return view('Page.index' , compact('products','products2','cmsPages','getCategories'));

        // $products = Product::with('Media')->orderByDesc('created_at')->paginate();
        // if (request()->ajax()) {
        //     return view(
        //         'Page.index',
        //         compact('products')
        //     );
        // }

   



    }


    public function search(Request $request){
        $search = request()->search;
        $product = Product::where("name", '='  , $search )->first();
        $getCategories=Category::getCategories();
    return view('Page.product-details-page',compact('product','search','getCategories'));
    }

    public function showProfile(string $id){
        $user=User::find($id);
        $getCategories=Category::getCategories();
        $cmsPages= CmsPage::where('status',1)->get()->toArray();
        return view('Page.profile_user',compact('user','getCategories','cmsPages'));
    }

    public function editeProfile(UpdateUserRequest $request,string $id){
        // $user=User::find($id);
        // $user->update($request->validate());
        $cmsPages= CmsPage::where('status',1)->get()->toArray();
        $getCategories=Category::getCategories();
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->birthDate = $request->input('birthDate');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('show_profile',compact('id','getCategories','cmsPages'));
    }

}

