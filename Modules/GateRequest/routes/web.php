<?php

use Illuminate\Support\Facades\Route;
use Modules\GateRequest\app\Http\Controllers\GateRequestController;

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
    Route::resource('gaterequest', GateRequestController::class)->except(['index'])->names('gaterequest');
    Route::get('gaterequests', [GateRequestController::class, 'index'])->name('gaterequest.index');
    Route::get('gaterequest', fn () => redirect()->route('admin.gaterequest.index'));
});
