<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RecycleController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

//admin panel routes start
Route::get('dashboard', [AdminController::class, 'index']);

Route::get('dashboard/user', [UserController::class, 'index']);
Route::get('dashboard/user/add', [UserController::class, 'add']);
Route::get('dashboard/user/edit', [UserController::class, 'edit']);
Route::get('dashboard/user/view/{id}', [UserController::class, 'view']);
Route::post('dashboard/user', [UserController::class, 'insert']);

Route::get('dashboard/product', [ProductController::class, 'index']);
Route::get('dashboard/product/add', [ProductController::class, 'add']);
Route::get('dashboard/product/edit/{slug}', [ProductController::class, 'edit']);
Route::get('dashboard/product/view/{slug}', [ProductController::class, 'view']);
Route::post('dashboard/product/submit', [ProductController::class, 'insert']);
Route::post('dashboard/product/update', [ProductController::class, 'update']);
Route::post('dashboard/product/softdelete', [ProductController::class, 'softdelete']);
Route::post('dashboard/product/delete', [ProductController::class, 'delete']);

Route::get('dashboard/product/category', [ProductCategoryController::class, 'index']);
Route::get('dashboard/product/category/add', [ProductCategoryController::class, 'add']);
Route::get('dashboard/product/category/edit/{slug}', [ProductCategoryController::class, 'edit']);
Route::get('dashboard/product/category/view/{slug}', [ProductCategoryController::class, 'view']);
Route::post('dashboard/product/category/submit', [ProductCategoryController::class, 'insert']);
Route::post('dashboard/product/category/update', [ProductCategoryController::class, 'update']);
Route::post('dashboard/product/category/softdelete', [ProductCategoryController::class, 'softdelete']);
Route::post('dashboard/product/category/restore', [ProductCategoryController::class, 'restore']);
Route::post('dashboard/product/category/delete', [ProductCategoryController::class, 'delete']);
Route::get('dashboard/product/category/excel', [ProductCategoryController::class, 'excel']);
Route::get('dashboard/product/category/pdf', [ProductCategoryController::class, 'pdf']);

Route::get('dashboard/product/purchase', [ProductPurchaseController::class, 'index']);
Route::get('dashboard/product/purchase/add', [ProductPurchaseController::class, 'add']);
Route::get('dashboard/product/purchase/edit/{slug}', [ProductPurchaseController::class, 'edit']);
Route::get('dashboard/product/purchase/view/{slug}', [ProductPurchaseController::class, 'view']);
Route::post('dashboard/product/purchase/submit', [ProductPurchaseController::class, 'insert']);
Route::post('dashboard/product/purchase/update', [ProductPurchaseController::class, 'update']);
Route::post('dashboard/product/purchase/softdelete', [ProductPurchaseController::class, 'softdelete']);
Route::post('dashboard/product/purchase/delete', [ProductPurchaseController::class, 'delete']);

Route::get('dashboard/customer', [CustomerController::class, 'index']);
Route::get('dashboard/customer/add', [CustomerController::class, 'add']);
Route::get('dashboard/customer/edit/{slug}', [CustomerController::class, 'edit']);
Route::get('dashboard/customer/view/{slug}', [CustomerController::class, 'view']);
Route::post('dashboard/customer/submit', [CustomerController::class, 'insert']);
Route::post('dashboard/customer/update', [CustomerController::class, 'update']);
Route::post('dashboard/customer/softdelete', [CustomerController::class, 'softdelete']);
Route::post('dashboard/customer/delete', [CustomerController::class, 'delete']);

Route::get('dashboard/supplier', [SupplierController::class, 'index']);
Route::get('dashboard/supplier/add', [SupplierController::class, 'add']);
Route::get('dashboard/supplier/edit/{slug}', [SupplierController::class, 'edit']);
Route::get('dashboard/supplier/view/{slug}', [SupplierController::class, 'view']);
Route::post('dashboard/supplier/submit', [SupplierController::class, 'insert']);
Route::post('dashboard/supplier/update', [SupplierController::class, 'update']);
Route::post('dashboard/supplier/softdelete', [SupplierController::class, 'softdelete']);
Route::post('dashboard/supplier/delete', [SupplierController::class, 'delete']);

Route::get('dashboard/recycle', [RecycleController::class, 'index']);
Route::get('dashboard/recycle/product/category', [RecycleController::class, 'product_category']);

require __DIR__.'/auth.php';
