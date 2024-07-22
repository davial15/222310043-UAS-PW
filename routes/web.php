<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OlahanController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampahController;



Route::get('/', function () {
    return view('Autentikasi.login');
})->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, "login"])->middleware('guest');
Route::resource('/sampah', SampahController::class)->middleware('auth');
Route::resource('/olahan', OlahanController::class)->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
