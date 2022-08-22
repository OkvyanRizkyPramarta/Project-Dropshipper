<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\AdmintrafficController;
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
    Route::post('/order',[OrderController::class,'import'])->name('import');
    Route::get('/order/{order}/updateStatusSent', [OrderController::class, 'updateStatusSent'])->name('order.updateStatusSent');
    Route::get('/order/{order}/updateStatusPaid', [OrderController::class, 'updateStatusPaid'])->name('order.updateStatusPaid');
    Route::get('/order/{order}/updateStatusPod', [OrderController::class, 'updateStatusPod'])->name('order.updateStatusPod');
    Route::get('/order/{order}/updateStatusDel', [OrderController::class, 'updateStatusDel'])->name('order.updateStatusDel');
    Route::resource('/document', DocumentController::class);
    Route::get('/account', [AccountController::class, 'index'])->name('owner.account');
    Route::resource('/register', UserController::class);
    Route::get('/user',[AccountController::class, 'user'])->name('account.user');
    Route::get('/user/{id}', [AccountController::class, 'detailUser'])->name('account.detailUser');;
});

Route::middleware(['auth', 'Admintraffic'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/admintraffic', [AdmintrafficController::class, 'dashboard'])->name('dashboardadmintraffic.index');
    Route::get('/account/admintraffic', [AdmintrafficController::class, 'account'])->name('admintraffic.account');
    Route::get('/order/admintraffic', [AdmintrafficController::class, 'order'])->name('admintraffic.order');
    Route::get('/order/admintraffic/{order}/updateStatusSent', [AdmintrafficController::class, 'updateStatusSent'])->name('order.updateStatusSent');
    Route::get('/order/admintraffic/{order}/updateStatusPaid', [AdmintrafficController::class, 'updateStatusPaid'])->name('order.updateStatusPaid');
    Route::get('/order/admintraffic/{order}/updateStatusPod', [AdmintrafficController::class, 'updateStatusPod'])->name('order.updateStatusPod');
    Route::get('/order/admintraffic/{order}/updateStatusDel', [AdmintrafficController::class, 'updateStatusDel'])->name('order.updateStatusDel');
    Route::get('/message/admintraffic', [AdmintrafficController::class, 'admintrafficMessage'])->name('admintraffic.message');
    Route::post('/message/admintraffic', [AdmintrafficController::class, 'admintrafficMessageStore'])->name('admintraffic.messageStore');
});

Route::middleware(['auth', 'Kurir'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/kurir', [CourierController::class, 'dashboard'])->name('dashboardkurir.index');
    Route::get('/account/kurir', [CourierController::class, 'account'])->name('courier.account');
    Route::get('/order/kurir', [CourierController::class, 'order'])->name('courier.order');
    Route::get('/order/kurir/{order}/updateStatusSent', [CourierController::class, 'updateStatusSent'])->name('order.updateStatusSent');
    Route::get('/order/kurir/{order}/updateStatusPaid', [CourierController::class, 'updateStatusPaid'])->name('order.updateStatusPaid');
    Route::get('/order/kurir/{order}/updateStatusPod', [CourierController::class, 'updateStatusPod'])->name('order.updateStatusPod');
    Route::get('/order/kurir/{order}/updateStatusDel', [CourierController::class, 'updateStatusDel'])->name('order.updateStatusDel');
    Route::get('/message/kurir', [CourierController::class, 'courierMessage'])->name('courier.message');
    Route::post('/message/kurir', [CourierController::class, 'courierMessageStore'])->name('courier.messageStore');
});
