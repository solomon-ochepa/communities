<?php

use Illuminate\Support\Facades\Route;
use Modules\Status\app\Http\Controllers\StatusController;

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
    Route::resource('status', StatusController::class)->except(['index'])->names('status');
    Route::get('statuses', [StatusController::class, 'index'])->name('status.index');
    Route::get('status', fn () => redirect()->route('admin.status.index'));
});
