<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('/brand', App\Http\Controllers\BrandController::class);
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::resource('/presentation', App\Http\Controllers\PresentationController::class);
    Route::resource('/client', App\Http\Controllers\ClientController::class);
    Route::resource('/supplier', App\Http\Controllers\SupplierController::class);
    Route::resource('/service', App\Http\Controllers\ServiceController::class);
    Route::resource('/product', App\Http\Controllers\ProductController::class);
    Route::resource('/promotion', App\Http\Controllers\PromotionController::class);

    Route::resource('/purchase', App\Http\Controllers\PurchaseController::class);
    Route::resource('/sale', App\Http\Controllers\SaleController::class);
    Route::resource('/price', App\Http\Controllers\PriceController::class);
});

