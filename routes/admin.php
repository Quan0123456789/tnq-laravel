<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\users\BlogController;
use Illuminate\Support\Facades\Route;
Route::get('create', [BlogController::class,'create'])->name('create');
Route::get('users', [BlogController::class, 'users_list'])->name('users');
Route::post('insert', [BlogController::class,'insert'])->name('insert');
Route::get('edit/{id}', [BlogController::class,'edit'])->name('edit');
Route::put('edit/{id}', [BlogController::class,'update'])->name('update');
Route::delete('delete/{id}', [BlogController::class,'delete'])->name('delete');

Route::get('createproduct', [ProductController::class,'createproduct'])->name('createproduct');
Route::get('product', [ProductController::class, 'productlist'])->name('product');
Route::post('insertproduct', [ProductController::class,'insertproduct'])->name('insertproduct');
Route::get('editproduct/{id}', [ProductController::class,'editproduct'])->name('editproduct');
Route::post('editproduct/{id}', [ProductController::class,'updateproduct'])->name('updateproduct');
Route::delete('deleteproduct/{id}', [ProductController::class,'deleteproduct'])->name('deleteproduct');