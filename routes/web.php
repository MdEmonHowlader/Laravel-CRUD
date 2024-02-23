<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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




// Route::get('/', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
// Route::get('product/{id}/edit', [ProductController::class, 'edit']);
// Route::put('product/{id}/update', [ProductController::class, 'update']);
// Route::get('product/{id}/delete', [ProductController::class, 'destroy']);


Route::controller(ProductController::class)->prefix('products')->group(function () {

    Route::get('/',  'index')->name('products.index');

    Route::get('/create', 'create')->name('products.create');
    Route::post('/store',  'store')
        ->name('products.store');
    Route::get('/{id}/edit', 'edit')
        ->name('products.edit');

    Route::put('/{id}/update', 'update')
        ->name('products.update');
    Route::get('/{id}/delete', 'destroy')
        ->name('products.destroy');
});
