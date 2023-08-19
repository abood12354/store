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
Route::get('/index_2', [Product_CardController::class,'index'])
->middleware(['auth', 'verified'])->name('main_page_1');

// Route::get('login/form', [LoginController::class, 'index'])
// ->name('login-form-2');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/Search', [IndexController::class,'search'])
->middleware(['auth', 'verified'])->name('Post_Search');



// Show shopping cart 
Route::get('/cart', [CartController::class,'index']);

// Add item to cart
Route::post('/cart/add/{id}', [CartController::class,'add'])
->name('add_cart'); 

// Update item quantity in cart
Route::post('/cart/update/{id}', [CartController::class,'update']);

// Remove item from cart
Route::delete('/cart/remove/{id}', [CartController::class,'remove']);

Route::get('/product_page/{id}', [ProductPageController::class,'index'])
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
