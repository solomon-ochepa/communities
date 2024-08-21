<?php

use Illuminate\Support\Facades\Route;
use Modules\Notice\app\Http\Controllers\NoticeController;

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
    Route::resource('notice', NoticeController::class)->except(['index'])->names('notice');
    Route::get('notices', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('notice', fn () => redirect()->route('admin.notice.index'));
});
