<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CmsContoller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\IndexController;
use App\Http\Controllers\WEB\LoginController;
use App\Http\Controllers\WEB\Product_CardController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WEB\CartController;
use App\Http\Controllers\WEB\ProductPageController;
use App\Http\Controllers\WEB\ReviewController;

use App\Http\Controllers\CmsFrontController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Admin;
use App\Models\CmsPage;
use App\Models\Product;

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



Route::get('/index', [IndexController::class,'index'])
->middleware(['auth', 'verified'])->name('main_page');






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




Route::get('/master', function () {
    // welcome
    return view('Sections.Index.haaaaaaaa');
})->middleware('auth')->name('dashboard1');



Route::match(['get', 'post'], 'adminlogin', [AdminController::class, 'login'])
   ->name('adminlogin');

Route::group(['middleware'=>['admin']],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::match(['get','post'],'update-password', [AdminController::class, 'updatePassword'])->name('update_password');
    Route::match(['get','post'],'update-details', [AdminController::class, 'updateDetails'])->name('update_details');
    Route::post('check-current-password', [AdminController::class, 'checkPassword'])->name('check_current_password');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');



 //cms
    Route::get('cms-pages', [CmsContoller::class, 'index'])->name('cms');
    Route::post('update-cms-pages-status', [CmsContoller::class, 'update'])->name('update_cms_pages_status');
    Route::match(['get','post'],'add-edit-cms-page/{id?}', [CmsContoller::class, 'edit'])->name('add_edit_cms_page');
    Route::get('delete-cms-page/{id?}', [CmsContoller::class, 'destroy'])->name('delete_cms');
//CMS Pages 
//comment here
$cmsUrls= CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
foreach ($cmsUrls as $url){

   Route::get('/'.$url, [CmsFrontController::class, 'cmsPage'])->name('cmsPage');
}

    
  //subadmins
    Route::get('subadmins', [AdminController::class, 'subadmins'])->name('subadmins');
    Route::post('update-subadmin-status', [AdminController::class, 'updateSubadmin'])->name('update_subadmin_status');
    Route::match(['get','post'],'add-edit-subadmin/{id?}', [AdminController::class, 'editSubadmin'])->name('add_edit_subadmin');
    Route::get('delete-subadmin/{id}', [AdminController::class, 'destroySubadmin'])->name('delete_subadmin');
    Route::match(['get','post'],' update-rule-subadmin/{id}', [AdminController::class, 'updateRule'])->name('update_rule_subadmin');
    
    //categories
    
    Route::get('categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('update-category-status', [CategoryController::class, 'update'])->name('update_category_status');
    Route::match(['get','post'],'add-edit-category/{id?}', [CategoryController::class, 'edit'])->name('add_edit_category');
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
    //
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('delete-product/{id}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::match(['get','post'],'add-edit-product/{id?}', [ProductController::class, 'edit'])->name('product');

});











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