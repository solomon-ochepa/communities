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
    Route::resource('activity', ActivityController::class)->except(['index'])->names('activity');
    Route::get('activitys', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('activity', fn () => redirect()->route('admin.activity.index'));
});
