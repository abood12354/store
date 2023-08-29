<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Product;
use App\Models\User;
use App\View\Components\product as ComponentsProduct;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class IndexController extends Controller
{

    public function index()
    {
        $products = Product::take(6)->get();
        $products2 = Product::skip(6)->take(6)->get();
        // foreach($products as $product){
        //dd($product->getFirstMedia());}
        return view('Page.index' , compact('products','products2'));

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
    return view('Page.product-details-page',compact('product','search'));
    }

    public function showProfile(string $id){
        $user=User::find($id);
        return view('Page.profile_user',compact('user'));
    }

    public function editeProfile(UpdateUserRequest $request,string $id){
        // $user=User::find($id);
        // $user->update($request->validate());
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->birthDate = $request->input('birthDate');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return redirect()->route('show_profile',compact('id'));
    }

}

