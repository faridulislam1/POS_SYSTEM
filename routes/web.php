<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;


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

Route::get('/', function () {
    return view('layout');
});


Route::resource('/category', categoryController::class);
Route::resource('/brand', BrandController::class);
Route::resource('/product', ProductController::class);
//Route::resource('/sale', SaleController::class);

Route::resource('/sale', SaleController::class);
Route::post('/search', [SaleController::class, 'search'])->name('search');
Route::post('/sales_add', [SaleController::class, 'store'])->name('sales_add');
