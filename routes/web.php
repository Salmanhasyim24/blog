<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistictController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');   
    Route::get('/logout', [ AdminController::class, 'adminlogout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

    //Category All Route
       Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category' , 'index')->name('category');
        Route::get('/add/category' , 'create')->name('add.category');
        Route::post('/store/category' , 'store')->name('store.category');
        Route::get('/edit/category/{id}' , 'edit')->name('edit.category');
        Route::post('/update/category' , 'update')->name('update.category');
        Route::get('/delete/category/{id}' , 'destroy')->name('delete.category');
    });
    //SubCategory All Route
       Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/all/subcategory' , 'index')->name('subcategory');
        Route::get('/add/subcategory' , 'create')->name('add.subcategory');
        Route::post('/store/subcategory' , 'store')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}' , 'edit')->name('edit.subcategory');
        Route::post('/update/subcategory' , 'update')->name('update.subcategory');
        Route::get('/delete/subcategory/{id}' , 'destroy')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');
    });
    //District All Route
       Route::controller(DistrictController::class)->group(function(){
        Route::get('/all/district' , 'index')->name('district');
        Route::get('/add/district' , 'create')->name('add.district');
        Route::post('/store/district' , 'store')->name('store.district');
        Route::get('/edit/district/{id}' , 'edit')->name('edit.district');
        Route::post('/update/district{id}' , 'update')->name('update.district');
        Route::get('/delete/district/{id}' , 'destroy')->name('delete.district');
    });
    //SubDistrict All Route
       Route::controller(SubDistictController::class)->group(function(){
        Route::get('/all/subdistrict' , 'index')->name('subdistrict');
        Route::get('/add/subdistrict' , 'create')->name('add.subdistrict');
        Route::post('/store/subdistrict' , 'store')->name('store.subdistrict');
        Route::get('/edit/subdistrict/{id}' , 'edit')->name('edit.subdistrict');
        Route::post('/update/subdistrict{id}' , 'update')->name('update.subdistrict');
        Route::get('/delete/subdistrict/{id}' , 'destroy')->name('delete.subdistrict');
    });
        //Post All Route
       Route::controller(PostController::class)->group(function(){
        Route::get('/all/post' , 'index')->name('post');
        Route::get('/add/post' , 'create')->name('add.post');
        Route::post('/store/post' , 'store')->name('store.post');
        Route::get('/edit/post/{id}' , 'edit')->name('edit.post');
        Route::post('/update/post' , 'update')->name('update.post');
        Route::post('/update/post/image' , 'updateimage')->name('update.postimage');
        Route::get('/delete/post/{id}' , 'destroy')->name('delete.post');
        Route::get('/get/subcategory/{category_id}' , 'GetSubCategory');
        Route::get('/get/subdistrict/{district_id}' , 'GetSubDistrict');
    });

});   








require __DIR__.'/auth.php';
