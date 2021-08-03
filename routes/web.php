<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;

use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });
//category route
Route::get('create-category', [CategoriesController::class, 'create']);
Route::post('create-category', [CategoriesController::class, 'store']);


//Product route
Route::get('/', [ProductsController::class, 'index'])->name('product-index');
Route::get('create-product', [ProductsController::class, 'create']);
Route::post('product-index', [ProductsController::class, 'store'])->name('product.index');
Route::get('edit-product{product_id}', [ProductsController::class, 'edit']);
Route::put('product-update{prodcut_id}', [ProductsController::class, 'update'])->name('product-update');
Route::get('delete-product{prodcut_id}',[ProductsController::class, 'delete']);
Route::get('show-product{prodcut_id}',[ProductsController::class, 'show']);