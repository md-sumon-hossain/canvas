<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\Website\ProductController;




use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\admin\HomeController as adminHomeController;
use App\Http\Controllers\website\LoginController as websiteLoginController;



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


# website
Route::get('/website/login',[websiteLoginController::class,'login'])->name('website.login');
Route::post('/website/dologin',[websiteLoginController::class,'dologin'])->name('website.dologin');


#middleware

Route::get('/website/logout',[websiteLoginController::class,'logout'])->name('website.logout');

# website pages

Route::get('/',[HomeController::class,'home'])->name('website.home');
Route::get('/about',[AboutController::class,'about'])->name('website.about');



# website product
Route::get('/products',[ProductController::class,'products'])->name('website.products');


# website category
Route::get('/category',[CategoryController::class,'category'])->name('website.category');









#Admin
Route::get('/login',[LoginController::class,'login'])->name('admin.login');
Route::post('/dologin',[LoginController::class,'dologin'])->name('admin.dologin');


#Authentication 
Route::group(['middlewire'=>'auth'],function () {
    Route::get('/home',[adminHomeController::class,'home'])->name('admin.home');

    
Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');
});




#socialite facebook
// Login with  Facebbok
Route::get('auth/facebook', [LoginController::class, 'facebookRedirect'])->name('login.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'loginWithFacebook']);

#linkedin socialite
Route::get('auth/linkedin', [LinkedInController::class, 'redirectToLinkedin']);
Route::get('auth/linkedin/callback', [LinkedInController::class, 'handleLinkedinCallback']);

#gmail socialit
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

