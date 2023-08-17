<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\IndexController;
use App\Http\Controllers\WEB\LoginController;
use App\Http\Controllers\WEB\Product_CardController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Admin;

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
// Route::get('/index', [Product_CardController::class,'index'])
// ->middleware(['auth', 'verified'])->name('main_page_1');

Route::get('login/form', [LoginController::class, 'index'])
->name('login-form-2');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/Search', [IndexController::class,'search'])
->middleware(['auth', 'verified'])->name('Post_Search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::match(['get', 'post'], 'adminlogin', [AdminController::class, 'login'])
   ->name('adminlogin');

Route::group(['middleware'=>['admin']],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])
    ->name('dashboard');
    
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});


