<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourierController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'Owner'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::resource('/document', DocumentController::class);
    Route::get('/account', [AccountController::class, 'index'])->name('owner.account');
    Route::resource('/register', UserController::class);
});

Route::middleware(['auth', 'Kurir'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/kurir', [CourierController::class, 'dashboard'])->name('dashboardkurir.index');
    Route::get('/account/kurir', [CourierController::class, 'account'])->name('courier.account');
    Route::get('/order/kurir', [CourierController::class, 'order'])->name('courier.order');
});
