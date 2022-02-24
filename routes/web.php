<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ProductController;
use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\AboutController;



use App\Http\Controllers\admin\HomeController as adminHomeController;



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

// Route::get('/', function () {
//     return view('website.master');
// });


//website
// website pages
Route::get('/',[HomeController::class,'home'])->name('website.home');
Route::get('/about',[AboutController::class,'about'])->name('website.about');


// website product
Route::get('/products',[ProductController::class,'products'])->name('website.products');


// website category
Route::get('/category',[CategoryController::class,'category'])->name('website.category');









//Admin
Route::get('/admin',[adminHomeController::class,'home'])->name('admin.home');