<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\IndexController;
use App\Http\Controllers\WEB\LoginController;
use App\Http\Controllers\WEB\Product_CardController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WEB\CartController;
use App\Http\Controllers\WEB\ProductPageController;
use App\Http\Controllers\WEB\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('/dashboard');
// })->middleware('auth');

Route::get('/index', [IndexController::class,'index'])
->middleware(['auth', 'verified'])->name('main_page');
// Route::get('/index_2', [Product_CardController::class,'index'])
// ->middleware(['auth', 'verified'])->name('main_page_1');

// Route::get('login/form', [LoginController::class, 'index'])
// ->name('login-form-2');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/Search', [IndexController::class,'search'])
->middleware(['auth', 'verified'])->name('Post_Search');

Route::post('/favorite/{id}', [CartController::class,'favorite'])
->middleware(['auth', 'verified'])->name('favorite_product');


Route::get('/profile/{id}', [IndexController::class,'showProfile'])
->middleware(['auth', 'verified'])->name('show_profile');

Route::put('/profile/edite/{id}', [IndexController::class,'editeProfile'])
->middleware(['auth', 'verified'])->name('update_profile');


// Show all reviews 

// /{id}
Route::post('/show_reviews', [ReviewController::class,'index']) 
->middleware(['auth', 'verified'])->name('show_comment');

// Submit a new review
Route::post('/reviews', [ReviewController::class,'store'])
->middleware(['auth', 'verified'])->name('add_review');


Route::post('/buy/{id}', [CartController::class,'buy'])
->middleware(['auth', 'verified'])->name('buy');


Route::post('/buy_by_cart', [CartController::class,'buy_by_cart'])
->middleware(['auth', 'verified'])->name('buy_by_cart');




// Show shopping cart 
Route::get('/cart', [CartController::class,'index']);

// Add item to cart
Route::post('/cart/add/{id}', [CartController::class,'add'])
->name('add_cart'); 

// Update item quantity in cart
Route::post('/cart/update/{id}', [CartController::class,'update']);

// Remove item from cart
Route::delete('/cart/remove/{id}', [CartController::class,'remove']);

Route::get('/product_page/{id}', [ProductPageController::class,'index1'])
->middleware(['auth', 'verified'])->name('product_page');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// <<<<<<< HEAD
// <<<<<<< HEAD
// =======

// >>>>>>> 54d6b352f4f9b0e782d776fce1a9e6888a437762
Route::get('/master', function () {
    // welcome
    return view('Sections.Index.haaaaaaaa');
})->middleware('auth')->name('dashboard1');
// <<<<<<< HEAD
// =======

// Route::get('/master', function () {
//     return view('welcome');
// })->middleware('auth')->name('dashboard1');
// =======
// >>>>>>> 54d6b352f4f9b0e782d776fce1a9e6888a437762



Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])
->name('dashboard');
// <<<<<<< HEAD
// >>>>>>> be63818a07765556cf2eb31df43768e59908bd2a
// =======

// >>>>>>> 54d6b352f4f9b0e782d776fce1a9e6888a437762







// how i can add reviws in my web site and this reviwes show in our web
//  site adn other user can show the reviwes
//plase give me the route and the controller and the views all thing




// public function index()
// {
//   $reviews = Review::latest()->get();

//   return view('reviews.index', compact('reviews'));
// }

// public function store(Request $request) 
// {
//   $review = new Review;
//   $review->body = $request->input('body');
//   $review->rating = $request->input('rating');
//   $review->user_id = auth()->id();

//   $review->save();

//   return redirect('/reviews');
// }






// @extends('layouts.app')

// @section('content')

//   @foreach($reviews as $review)
//     <div class="review">
//       <p>{{ $review->body }}</p>
//       <p>Rating: {{ $review->rating }}</p>
//     </div>
//   @endforeach

// @endsection