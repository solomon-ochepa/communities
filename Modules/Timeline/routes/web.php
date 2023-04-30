<?php

use Illuminate\Support\Facades\Route;
use Modules\Timeline\app\Http\Controllers\TimelineController;

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
    Route::resource('timeline', TimelineController::class)->except(['index'])->names('timeline');
    Route::get('timelines', [TimelineController::class, 'index'])->name('timeline.index');
    Route::get('timeline', fn () => redirect()->route('admin.timeline.index'));
});
