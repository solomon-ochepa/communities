<?php

use Illuminate\Support\Facades\Route;
use Modules\Noticeboard\app\Http\Controllers\Admin\NoticeboardController;

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
    Route::resource('noticeboard', NoticeboardController::class)->except(['index'])->names('noticeboard');
    Route::get('noticeboards', [NoticeboardController::class, 'index'])->name('noticeboard.index');
    Route::get('noticeboard', fn () => redirect()->route('admin.noticeboard.index'));
});
