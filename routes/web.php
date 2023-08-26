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
use App\Http\Controllers\CmsFrontController;
use App\Http\Middleware\Admin;
use App\Models\CmsPage;

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

//CMS Pages
$cmsUrls= CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
foreach ($cmsUrls as $url){

    Route::get('/'.$url, [CmsFrontController::class, 'cmsPage'])->name('cmsPage');
}

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

  //subadmins
    Route::get('subadmins', [AdminController::class, 'subadmins'])->name('subadmins');
    Route::post('update-subadmin-status', [AdminController::class, 'updateSubadmin'])->name('update_subadmin_status');
    Route::match(['get','post'],'add-edit-subadmin/{id?}', [AdminController::class, 'editSubadmin'])->name('add_edit_subadmin');
    Route::get('delete-subadmin/{id?}', [AdminController::class, 'destroySubadmin'])->name('delete_subadmin');
});


