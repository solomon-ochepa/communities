<?php

use Illuminate\Support\Facades\Route;
use Modules\Gatepass\app\Http\Controllers\Admin\GatepassController;
use Modules\GatepassRequest\app\Http\Controllers\GatepassRequestController;

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

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('gatepass', GatepassController::class)->except(['index'])->names('gatepass');
    Route::get('gatepasses', [GatepassController::class, 'index'])->name('gatepass.index');
    Route::get('gatepass', fn () => redirect()->route('admin.gatepass.index'));

    // Requests
    Route::resource('gatepass/{gatepass}/request', GatepassRequestController::class)->except(['index'])->names('gatepass.request');
    Route::get('gatepass/{gatepass}/requests', [GatepassRequestController::class, 'index'])->name('gatepass.request.index');
    Route::get('gatepass/{gatepass}/request', fn () => redirect()->route('admin.gatepass.request.index'));
});
