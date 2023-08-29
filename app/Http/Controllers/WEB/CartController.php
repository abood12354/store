<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
 
    public function add($id) {

      $product = Product::find($id); 

       if(($product->quantity)>0){


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
      //   return response()->json(['div_add_cart'=>'add cart successfuly']);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
      }
      else return alert("the product is empty");
   }



   public function remove_from_cart(string $id){
      $cart = session()->get('cart', []);

if (isset($cart[$id])) {
    unset($cart[$id]);
    session()->put('cart', $cart);
   //  return response()->json(['div_remove_cart' => 'Item removed from cart successfully']);
   return redirect()->back()->with('success', 'Product added to cart successfully!');

} else {
    return response()->json(['div_remove_cart' => 'Item not found in cart']);
}
      
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
   



   public function buy(string $id){
      $product=Product::find($id);
      if(($product->quantity)>0){
      if(Auth::user()){
      $user=Auth::user()->userable_id;
      $order=Order::create([
         // 'client_id'=>$user,
         'totalPrice'=>$product->price,
         'done'=>true,
         'client_id'=>$user,
      ]);
      return redirect()->back()->with('success', 'Product added to cart successfully!');
         }
       }
   }



   public function buy_by_cart(){
      $user=Auth::user()->userable_id;
    //  $cart = session()->get('cart',[]);

      // Check if cart session array exists
if(session()->has('cart') && is_array(session('cart'))) {

   // Get cart array
   $cart = session('cart'); 
   
   // Initialize total
   $total = 0;
 
   // Loop through cart array and add up price * quantity
   foreach($cart as $item) {
     $total += $item['price'] * $item['quantity']; 
   }
      // $cart
      $totalprice="";
$order=Order::create([
   'client_id' => $user,
   'totalPrice'=>$total,
   'done'=>true,
]);
// Empty the cart session
session()->forget('cart');
return redirect()->back()->with('success', 'Product added to cart successfully!');

}
else
return ;

   }
}