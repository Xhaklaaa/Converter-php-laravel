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


Route::view('/', 'welcome')->name('welcome');

Route::get('/convert', [\App\Http\Controllers\CurrencyController::class, 'index'])->middleware('auth')->name('convert');
Route::post('/convert', [\App\Http\Controllers\CurrencyController::class, 'convert'])->middleware('auth')->name('convert');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class,'create'])->middleware('guest')->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class,'store'])->middleware('guest')->name('register');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'create'])->middleware('guest')->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,'store'])->middleware('guest');

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,'destroy'])->middleware('auth')->name('logout');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class,'destroy'])->middleware('auth')->name('logout');
