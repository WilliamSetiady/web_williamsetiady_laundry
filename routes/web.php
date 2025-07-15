<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// (/) menyatakan halaman default
Route::get('/', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    route::resource('dashboard', DashboardController::class);
    route::resource('user', UserController::class);
    route::resource('level', LevelController::class);
    route::resource('customer', CustomerController::class);
    route::resource('service', ServiceController::class);
    route::resource('trans', TransOrderController::class);
    Route::get('print_struk/{id}', [TransOrderController::class, 'printStruk'])->name('print_struk');
    Route::get('transDetail/{id}', [TransOrderController::class, 'transDetail'])->name('trans_detail');
});
