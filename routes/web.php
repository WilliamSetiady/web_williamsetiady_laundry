<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// (/) menyatakan halaman default
Route::get('/', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
});

Route::middleware(['auth', 'Lead'])->group(function () {
    Route::resource('report', ReportController::class);
});


Route::middleware(['auth', 'adopt'])->group(function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('trans', TransOrderController::class);
    Route::get('print_struk/{id}', [TransOrderController::class, 'printStruk'])->name('print_struk');
    Route::get('transDetail/{id}', [TransOrderController::class, 'transDetail'])->name('trans_detail');
});

Route::middleware(['auth', 'Adm'])->group(function () {

    Route::resource('user', UserController::class);
    Route::resource('level', LevelController::class);
    Route::resource('service', ServiceController::class);
});
