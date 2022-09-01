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
use App\Http\Controllers\KasirController;
use App\Http\Controllers\InboundOutboundController;
use App\Http\Controllers\Admin2Controller;
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
    Route::get('/order/{order}/updateStatusChecking', [OrderController::class, 'updateStatusChecking'])->name('order.updateStatusChecking');
    Route::get('/order/{order}/updateStatusCheckingPending', [OrderController::class, 'updateStatusCheckingPending'])->name('order.updateStatusCheckingPending');
    Route::get('/order/{order}/updateStatusSent', [OrderController::class, 'updateStatusSent'])->name('order.updateStatusSent');
    Route::get('/order/{order}/updateStatusSentPending', [OrderController::class, 'updateStatusSentPending'])->name('order.updateStatusSentPending');
    Route::get('/order/{order}/updateStatusPaid', [OrderController::class, 'updateStatusPaid'])->name('order.updateStatusPaid');
    Route::get('/order/{order}/updateStatusPaidPending', [OrderController::class, 'updateStatusPaidPending'])->name('order.updateStatusPaidPending');
    Route::get('/order/{order}/updateStatusPod', [OrderController::class, 'updateStatusPod'])->name('order.updateStatusPod');
    Route::get('/order/{order}/updateStatusPodPending', [OrderController::class, 'updateStatusPodPending'])->name('order.updateStatusPodPending');
    Route::get('/order/{order}/updateStatusDel', [OrderController::class, 'updateStatusDel'])->name('order.updateStatusDel');
    Route::get('/order/{order}/updateStatusDelUndelivery', [OrderController::class, 'updateStatusDelUndelivery'])->name('order.updateStatusDelUndelivery');
    Route::get('/order/{order}/updateStatusTransaction', [OrderController::class, 'updateStatusTransaction'])->name('order.updateStatusTransaction');
    Route::get('/order/{order}/updateStatusTransactionUnfinished', [OrderController::class, 'updateStatusTransactionUnfinished'])->name('order.updateStatusTransactionUnfinished');
    Route::get('/order/{order}/updateStatusReceived', [OrderController::class, 'updateStatusReceived'])->name('order.updateStatusReceived');
    Route::get('/order/{order}/updateStatusReceivedPending', [OrderController::class, 'updateStatusReceivedPending'])->name('order.updateStatusReceivedPending');
    Route::get('/order/edit/{order}', [OrderController::class, 'edit'])->name('order.edit');
    Route::put('/order/{order}',[OrderController::class,'update'])->name('order.update');
    Route::delete('/order/{order}',[OrderController::class, 'destroy'])->name('order.destroy');
    Route::resource('/document', DocumentController::class);
    Route::get('/account', [AccountController::class, 'index'])->name('owner.account');
    Route::resource('/register', UserController::class);
    Route::get('/user',[AccountController::class, 'user'])->name('account.user');
    Route::get('/user/{id}', [AccountController::class, 'detailUser'])->name('account.detailUser');
    Route::get('/detailmessage',[AccountController::class, 'detailMessage'])->name('user.detailMessage');
    Route::delete('/detailmessage/{informations}',[InformationController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth', 'InboundOutbound'])->group(function () {
    Route::get('/warning', [DashboardboundController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/inboundoutbound', [InboundOutboundController::class, 'dashboard'])->name('dashboardinboundoutbound.index');
    Route::get('/account/inboundoutbound', [InboundOutboundController::class, 'account'])->name('inboundoutbound.account');
    Route::get('/order/inboundoutbound', [InboundOutboundController::class, 'order'])->name('inboundoutbound.order');
    Route::get('/order/inboundoutbound/{order}/updateStatusCheckingInboundOutbound', [InboundOutboundController::class, 'updateStatusCheckingInboundOutbound'])->name('order.updateStatusCheckingInboundOutbound');
    Route::get('/message/inboundoutbound', [InboundOutboundController::class, 'inboundoutboundMessage'])->name('inboundoutbound.message');
    Route::post('/message/inboundoutbound', [InboundOutboundController::class, 'inboundoutboundMessageStore'])->name('inboundoutbound.messageStore');
});

Route::middleware(['auth', 'Admintraffic'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/admintraffic', [AdmintrafficController::class, 'dashboard'])->name('dashboardadmintraffic.index');
    Route::get('/account/admintraffic', [AdmintrafficController::class, 'account'])->name('admintraffic.account');
    Route::get('/order/admintraffic', [AdmintrafficController::class, 'order'])->name('admintraffic.order');
    Route::post('/order/admintraffic',[AdmintrafficController::class,'importAdmintraffic'])->name('importAdmintraffic');
    Route::get('/order/admintraffic/{order}/updateStatusSentAdmintraffic', [AdmintrafficController::class, 'updateStatusSentAdmintraffic'])->name('order.updateStatusSentAdmintraffic');
    Route::get('/order/admintraffic/{order}/updateStatusPaidAdmintraffic', [AdmintrafficController::class, 'updateStatusPaidAdmintraffic'])->name('order.updateStatusPaidAdmintraffic');
    Route::get('/order/admintraffic/{order}/updateStatusPodAdmintraffic', [AdmintrafficController::class, 'updateStatusPodAdmintraffic'])->name('order.updateStatusPodAdmintraffic');
    Route::get('/order/admintraffic/{order}/updateStatusDelAdmintraffic', [AdmintrafficController::class, 'updateStatusDelAdmintraffic'])->name('order.updateStatusDelAdmintraffic');
    Route::get('/order/edit/admintraffic/{order}', [AdmintrafficController::class, 'edit'])->name('admintraffic.edit');
    Route::put('/order/admintraffic/{order}',[AdmintrafficController::class,'update'])->name('admintraffic.update');
    Route::get('/message/admintraffic', [AdmintrafficController::class, 'admintrafficMessage'])->name('admintraffic.message');
    Route::post('/message/admintraffic', [AdmintrafficController::class, 'admintrafficMessageStore'])->name('admintraffic.messageStore');
});

Route::middleware(['auth', 'Kasir'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/kasir', [KasirController::class, 'dashboard'])->name('dashboardkasir.index');
    Route::get('/account/kasir', [KasirController::class, 'account'])->name('kasir.account');
    Route::get('/order/kasir', [KasirController::class, 'order'])->name('kasir.order');
    Route::get('/order/kasir/{order}/updateStatusTransactionKasir', [KasirController::class, 'updateStatusTransactionKasir'])->name('order.updateStatusTransactionKasir');
    Route::get('/message/kasir', [KasirController::class, 'kasirMessage'])->name('kasir.message');
    Route::post('/message/kasir', [KasirController::class, 'kasirMessageStore'])->name('kasir.messageStore');
});

Route::middleware(['auth', 'Kurir'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/kurir', [CourierController::class, 'dashboard'])->name('dashboardkurir.index');
    Route::get('/account/kurir', [CourierController::class, 'account'])->name('courier.account');
    Route::get('/order/kurir', [CourierController::class, 'order'])->name('courier.order');
    Route::get('/order/kurir/{order}/updateStatusSentKurir', [CourierController::class, 'updateStatusSentKurir'])->name('order.updateStatusSentKurir');
    Route::get('/order/kurir/{order}/updateStatusPaidKurir', [CourierController::class, 'updateStatusPaidKurir'])->name('order.updateStatusPaidKurir');
    Route::get('/order/kurir/{order}/updateStatusPodKurir', [CourierController::class, 'updateStatusPodkurir'])->name('order.updateStatusPodKurir');
    Route::get('/order/kurir/{order}/updateStatusDelKurir', [CourierController::class, 'updateStatusDelKurir'])->name('order.updateStatusDelKurir');
    Route::get('/message/kurir', [CourierController::class, 'courierMessage'])->name('courier.message');
    Route::post('/message/kurir', [CourierController::class, 'courierMessageStore'])->name('courier.messageStore');
});

Route::middleware(['auth', 'Admin2'])->group(function () {
    Route::get('/warning', [DashboardController::class, 'warning'])->name('warning.index');
    Route::get('/dashboard/admin2', [Admin2Controller::class, 'dashboard'])->name('dashboardadmin2.index');
    Route::get('/account/admin2', [Admin2Controller::class, 'account'])->name('admin2.account');
    Route::get('/order/admin2', [Admin2Controller::class, 'order'])->name('admin2.order');
    Route::get('/order/admin2/{order}/updateStatusReceivedAdmin2', [Admin2Controller::class, 'updateStatusReceivedAdmin2'])->name('order.updateStatusReceivedAdmin2');
    Route::get('/message/admin2', [Admin2Controller::class, 'admin2Message'])->name('admin2.message');
    Route::post('/message/admin2', [Admin2Controller::class, 'admin2MessageStore'])->name('admin2.messageStore');
});