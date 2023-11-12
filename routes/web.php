<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
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
});
