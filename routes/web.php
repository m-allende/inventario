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


Route::get('/', function () {
    return redirect('login');
});
*/

Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\SiteController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\SiteController::class, 'contact'])->name('contact');
Route::get('/catalog', [App\Http\Controllers\SiteController::class, 'catalog'])->name('catalog');
Route::get('/services', [App\Http\Controllers\SiteController::class, 'services'])->name('services');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/user', App\Http\Controllers\UserController::class);
    Route::resource('/role', App\Http\Controllers\RoleController::class);

    Route::resource('/brand', App\Http\Controllers\BrandController::class);
    Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::resource('/presentation', App\Http\Controllers\PresentationController::class);
    Route::resource('/client', App\Http\Controllers\ClientController::class);
    Route::resource('/supplier', App\Http\Controllers\SupplierController::class);
    Route::resource('/service', App\Http\Controllers\ServiceController::class);
    Route::resource('/product', App\Http\Controllers\ProductController::class);
    Route::resource('/promotion', App\Http\Controllers\PromotionController::class);
    Route::resource('/shelf', App\Http\Controllers\ShelfController::class);

    Route::resource('/purchase', App\Http\Controllers\PurchaseController::class);
    Route::resource('/sale', App\Http\Controllers\SaleController::class);
    Route::resource('/price', App\Http\Controllers\PriceController::class);
});

