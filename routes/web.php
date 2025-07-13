<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// (/) menyatakan halaman default 
Route::get('/', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    route::resource('dashboard', DashboardController::class);
    route::resource('user', UserController::class);
});
