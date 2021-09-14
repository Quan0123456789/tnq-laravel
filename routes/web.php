<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\users\BlogController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\Product\ShopController;
  
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
  
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('index', [AuthController::class, 'index']);  
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('index', [ShopController::class, 'productList'])->name('product');
Route::get('searchProduct', [ShopController::class, 'searchProduct'])->name('searchProduct');
Route::post('searchProduct', [ShopController::class, 'searchProduct'])->name('searchProduct');
Route::get('productDetail/{id}', [ShopController::class, 'productDetail'])->name('productDetail');
Route::post('productDetail/{id}', [ShopController::class, 'productDetail'])->name('productDetail');
Route::get('category', [ShopController::class, 'category'])->name('category');
