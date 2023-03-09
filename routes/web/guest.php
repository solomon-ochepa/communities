<?php

use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['frontend']], function () {
    Route::get('/home', [CheckInController::class, 'index'])->name('home');
    Route::get('/', [CheckInController::class, 'index'])->name('/');
    Route::get('/scan', [CheckInController::class, 'scanQr'])->name('check-in.scan-qr');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'getVisitor'])->name('checkout.index');

    Route::get('/checkout/update/{visitingDetails}', [CheckoutController::class, 'update'])->name('checkout.update');

    Route::get('/check-in', [CheckInController::class, 'index'])->name('check-in');
    Route::get('/check-in/create-step-one', [CheckInController::class, 'createStepOne'])->name('check-in.step-one');
    Route::post('/check-in/create-step-one', [CheckInController::class, 'postCreateStepOne'])->name('check-in.step-one.next');
    Route::get('/check-in/create-step-two', [CheckInController::class, 'createStepTwo'])->name('check-in.step-two');
    Route::post('/check-in/create-step-two', [CheckInController::class, 'store'])->name('check-in.step-two.next');

    Route::get('/check-in/show/{id}', [CheckInController::class, 'show'])->name('check-in.show');
    Route::get('/check-in/return', [CheckInController::class, 'visitor_return'])->name('check-in.return');
    Route::post('/check-in/return', [CheckInController::class, 'find_visitor'])->name('check-in.find.visitor');

    Route::get('/check-in/pre-registered', [CheckInController::class, 'pre_registered'])->name('check-in.pre.registered');
    Route::post('/check-in/pre-registered', [CheckInController::class, 'find_pre_visitor'])->name('check-in.find.pre.visitor');

    Route::get('check-in/visitor-details/{visitorPhone}', [CheckInController::class, 'visitorDetails'])->name('checkin.visitor-details');
    Route::get('check-in/pre-registered/visitor-details/{visitorPhone}', [CheckInController::class, 'preVisitorDetails'])->name('checkin.pre-visitor-details');
});

Route::get('visitor/change-status/{status}/{token}',  [FrontendController::class, 'changeStatus']);
Route::get('qrcode/{number}',  [FrontendController::class, 'qrcode'])->name('qrcode');
