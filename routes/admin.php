<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\users\BlogController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' =>'users' ], function() {
        Route::get('create', [BlogController::class,'create'])->name('create');
        Route::get('/', [BlogController::class, 'users_list'])->name('users');
        Route::post('insert', [BlogController::class,'insert'])->name('insert');
        Route::get('edit/{id}', [BlogController::class,'edit'])->name('edit');
        Route::put('edit/{id}', [BlogController::class,'update'])->name('update');
        Route::delete('delete/{id}', [BlogController::class,'delete'])->name('delete');
});
Route::group(['prefix' =>'product' ], function() {
        Route::get('createProduct', [ProductController::class,'createProduct'])->name('createProduct');
        Route::get('/', [ProductController::class, 'productlist'])->name('product');
        Route::post('insertProduct', [ProductController::class,'insertProduct'])->name('insertProduct');
        Route::get('editProduct/{id}', [ProductController::class,'editProduct'])->name('editProduct');
        Route::post('editProduct/{id}', [ProductController::class,'updateProduct'])->name('updateProduct');
        Route::delete('deleteProduct/{id}', [ProductController::class,'deleteProduct'])->name('deleteProduct');
        Route::get('search', [ProductController::class, 'search'])->name('search');
        Route::post('search', [ProductController::class, 'search'])->name('search');
});
