<?php

use Illuminate\Support\Facades\Route;
use Modules\Guestbook\app\Http\Controllers\Admin\GuestbookController;

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
    Route::resource('guestbook', GuestbookController::class)->except(['index'])->names('guestbook');
    Route::get('guestbooks', [GuestbookController::class, 'index'])->name('guestbook.index');
    Route::get('guestbook', fn () => redirect()->route('admin.guestbook.index'));
});
