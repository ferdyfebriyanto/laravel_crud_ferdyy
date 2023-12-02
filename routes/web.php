<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
    return redirect(route('login'));
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('prosesLogin', [UserController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('prosesRegister', [UserController::class, 'prosesRegister'])->name('prosesRegister');
Route::group(['middleware' => 'admin'], function () {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('delete/{user}', [UserController::class, 'deleteAccount'])->name('delete');
    Route::put('updateProfile/{user}', [UserController::class, 'updateProfile'])->name('updateProfile');

    //PRODUCT
    Route::get('product', [ProductController::class, 'index'])->name('product.index');
    Route::post('product', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('product/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.delete');

    // CATEGORY
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('category/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.delete');


});
