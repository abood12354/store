<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  // string $id
    public function index()
    {
    // $comments = Comment::all();
    // $product = Product::take('id')->first();
    //return view('Page.product-details-page', compact('comments','product'));
    return redirect()->route('show_comment');   
  }



  public function show()
  {
  $comments = Comment::all();
  // $product = Product::take('id')->first();
  //return view('Page.product-details-page', compact('comments','product'));
  return view('Sections.Second_Page.Show_Comment', compact('comments'));   
}


     public function store(Request $request) 
{
  $comments = Comment::create([
  'body' => $request->body,
//   $comments->rating = $request->input('rating');
  'user_id' => auth()->id(),
  'product_id'=>$request->idd,
]);
  return response()->json(['div_add_comment'=>'favorite successfuly']);
}

}

  //,compact('id')
  // ->route('product_page',compact('id'));
  //return redirect()->route('product_page',compact('idd'));
  // return redirect()->route('show_review');