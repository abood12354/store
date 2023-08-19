<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function addToCart(Request $request)
    // {
    //   $productId = $request->product_id;
    
    //   $cart = session()->get('cart');
    
    //   // Check if product exists in cart
    //   if(isset($cart[$productId])) {
    //     $cart[$productId]['quantity']++;
    //   } else {
    //     $cart[$productId] = [
    //         "id" => $productId,
    //         "quantity" => 1
    //     ];
    //   }
      
    //   // Put updated cart back in session
    //   session()->put('cart', $cart);
      
    //   return redirect()->back()->with('success', 'Product added!');
    // }
    
    // public function getCart()
    // {
    //   return view('Page.cart', [
    //     'cartItems' => session()->get('cart')
    //   ]);
    // }


    /////////////////////////



    // public function addToCart(Request $request) {

    //     // Get product data
    //     $productId = $request->id;
    //     $quantity = $request->quantity;
    //     $name = $request->name;
    //     $status = $request->status;
    //     // $quantity = $request->quantity;  
      
    //     // Get cart items from session
    //    $cart = session()->get('cart');
      
        
    //     // $cart[$productId] = $productId;
    //     // session()->put('cart', $cart);
      
    //     // $cart[$quantity] = $quantity;
    //     // session()->put('cart', $cart);
    //     // $cart[$name] = $name;


    //     array_push($cart, [
    //         'id' => $productId,
    //         'quantity' => $quantity ,
    //         'name'=>$name,
    //         'status'=>$status
    //       ]);

    //     session()->put('cart', $cart);

    //     return redirect('/cart');
      
    //   }
      
    //   public function showCart() {
      
    //     $cartItems[] = session()->get('cart');
      
    //     // Pass to view
    //     return view('Page.cart', compact('cartItems'));
      
    //   }




    ////////////////////////////


    // public function add($id) {
    //   $product = Product::find($id); 
    
    //   $cart = session()->get('cart');
    
    //   // if cart is empty, create it
    //   if(!$cart) {
    //     $cart = [
    //         $id => [
    //             "name" => $product->name,
    //             "quantity" => 1,
    //             "price" => $product->price
    //         ]
    //     ];
        
    //     session()->put('cart', $cart);
    //     // return redirect()->back()->with('success', 'Product added to cart successfully!');
    //     // return view('Page.cart' ,compact($cart[$id]))
    //     // ->with('success', 'Product added to cart successfully!');
    //   }
    
    //   // if cart not empty then check if this product exist then increment quantity
    //   if(isset($cart[$id])) {
    //     $cart[$id]['quantity']++;
    //     session()->put('cart', $cart);
    //     // return redirect()->back()->with('success', 'Product added to cart successfully!');
    //   //   return view('Page.cart' ,compact($cart[$id]))
    //   // ->with('success', 'Product added to cart successfully!');
    //   }
    
    //   // if item not exist in cart then add to cart 
    //   $cart[$id] = [
    //     "name" => $product->name,
    //     "quantity" => 1,
    //     "price" => $product->price
    //   ];
      
    //   session()->put('cart', $cart);
    //   $cartItem = $cart[$id]; 

    //   return view('Page.cart', compact('cartItem'));
    //   // ->with('success', 'Product added to cart successfully!');
    // }


    public function add($id) {

      $product = Product::find($id); 

      $cart = session()->get('cart',[]);  
      
         if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
      }else{
             $cart[$id] = [
        "name" => $product->name,
        "quantity" => 1,
        "price" => $product->price,
             ];
      }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

   }
}