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
    Route::resource('option', OptionController::class)->except(['index'])->names('option');
    Route::get('options', [OptionController::class, 'index'])->name('option.index');
    Route::get('option', fn () => redirect()->route('admin.option.index'));
});
