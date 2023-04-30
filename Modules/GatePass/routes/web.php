<?php

use Illuminate\Support\Facades\Route;
use Modules\GatePass\app\Http\Controllers\Admin\GatePassController;

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
    Route::resource('gatepass', GatePassController::class)->except(['index'])->names('gatepass');
    Route::get('gatepasses', [GatePassController::class, 'index'])->name('gatepass.index');
    Route::get('gatepass', fn () => redirect()->route('admin.gatepass.index'));
});
