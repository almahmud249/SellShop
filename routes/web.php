<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;

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
route::prefix("admin")->group(base_path("routes/admin.php"));



Route::get('/', function () {
    return view('public.public_master');
});
// Route::get('/home', function () {
//     return view('home');
// });

Route::group(['middleware' => 'auth'],function () {
    route::get('/dashboard', [HomeController::class,'index']);


});

Auth::routes();
route::get('/userlogin', [HomeController::class,'index'])->name('login');
route::get("all_users",[HomeController::class,'GetUser']);

route::get('get_pro_by_filter/{data}',[ProductController::class,'filter']);

Route::resource('wishlist', WishlistController::class);
Route::get('/get_all_wishList/{id}', [WishlistController::class,'AllWishList']);


route::get('/get_View_product',[ProductController::class,'GetViewProduct']);




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::view('/{any}', 'public.public_master')->where('any', '.*');
Route::get('/{anypath}',[HomeController::class,'index'])->where('path','.*');
