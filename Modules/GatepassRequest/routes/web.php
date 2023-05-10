<?php

use Illuminate\Support\Facades\Route;

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
    Route::resource('gatepassrequest', GatepassRequestController::class)->except(['index'])->names('gatepassrequest');
    Route::get('gatepassrequests', [GatepassRequestController::class, 'index'])->name('gatepassrequest.index');
    Route::get('gatepassrequest', fn () => redirect()->route('admin.gatepassrequest.index'));
});
