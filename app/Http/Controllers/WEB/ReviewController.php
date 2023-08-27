<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
  // string $id
    public function index1()
    {
    $comments = Comment::latest()->get();
    // $product = Product::take('id')->first();
    //return view('Page.product-details-page', compact('comments','product'));
    return view('Sections.Second_Page.Reviews', compact('comments'));   
  }


     public function store(Request $request) 
{
  $comments = new Comment();
  $comments->body = $request->body;
//   $comments->rating = $request->input('rating');
  $comments->user_id = auth()->id();
  $comments->product_id=$request->idd;
  $comments->save();

  //,compact('id')
  // ->route('product_page',compact('id'));
  //return redirect()->route('product_page',compact('idd'));
  // return redirect()->route('show_review');
  return response()->json(['div_add_comment'=>'favorite successfuly']);
}

}
