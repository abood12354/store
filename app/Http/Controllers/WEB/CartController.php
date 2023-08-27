<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
 
    public function add($id) {

      $product = Product::find($id); 

      $cart = session()->get('cart',[]);  
      
         if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
      }else{
             $cart[$id] = [
        "id"=>$product->id,
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
             ];
      }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

   }


   public function favorite(string $id ){
$product=Product::findOrFail($id);
    if(Auth::user()){
       $user=Auth::user()->userable_id;
       $favorite = Favorite::create([
        'client_id' => $user,
        'favoritable_type' => Product::class,
        'favoritable_id' => $product->id,
    ]);
    return response()->json(['div_1'=>'favorite successfuly']);
    }

   }

}