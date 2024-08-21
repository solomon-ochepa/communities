<?php

use Illuminate\Support\Facades\Route;
use Modules\Estate\app\Http\Controllers\EstateController;

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
    Route::resource('estate', EstateController::class)->except(['index'])->names('estate');
    Route::get('estates', [EstateController::class, 'index'])->name('estate.index');
    Route::get('estate', fn () => redirect()->route('admin.estate.index'));
});
