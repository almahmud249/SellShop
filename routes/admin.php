<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;



Route::get('/', function () {
    return view('admin.admin_master');
});
// route::get('/login', [LoginController::class,'login'])->name('login');
route::post('/login', [LoginController::class,'login'])->name('admin.login');
route::post('/regis', [RegisterController::class,'register']);
route::post('/logout', [LoginController::class,'logout'])->name('logout');


Route::middleware(['adminCheck'])->group(function () {
    route::post("/add_category",[CategoryController::class,'AddCat']);
    route::get("/get_category",[CategoryController::class,'GetCat'])->name('get.cat');
    route::post("/update_category",[CategoryController::class,'UpdateCat']);
    route::post("/delete_category",[CategoryController::class,'DeleteCat']);
    route::post("/multi_delete",[CategoryController::class,'MultiDelete']);


    route::post("/add_brand",[BrandController::class,'AddBrand']);
    route::get("/get_brand",[BrandController::class,'GetBrand']);
    route::post("/update_brand",[BrandController::class,'UpdateBrand']);
    route::post("/delete_brand",[BrandController::class,'DeleteBrand']);
    route::post("/multi_delete_brand",[BrandController::class,'MultiDelete']);



    route::post("/post_product",[ProductController::class,'AddProduct']);
    route::get("/get_product",[ProductController::class,'GetProduct']);
    route::get("/get_item/{id}",[ProductController::class,'GetItem']);
    route::post("/update_product/{id}",[ProductController::class,'UpdateItem']);
    route::post("/delete_product",[ProductController::class,'DeleteItem']);
    
    route::get("/get_admin",[AdminController::class,'admin']);

});
//




// Route::view('/{any}', 'admin.admin_master')->where('any', '.*');
Route::get('/{anypath}',[HomeController::class,'index2'])->where('path','.*');

