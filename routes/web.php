<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\IndexController;
use App\Http\Controllers\WEB\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('login/form', [LoginController::class, 'index'])
->name('login-form-2');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/master', function () {
    return view('welcome');
})->middleware('auth')->name('dashboard1');