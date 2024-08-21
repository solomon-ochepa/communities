<?php

use Illuminate\Support\Facades\Route;
use Modules\Message\app\Http\Controllers\MessageController;

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

Route::middleware(['auth', 'verified'])/*->name('admin.')*/->group(function () {
    Route::resource('message', MessageController::class)->except(['index'])->names('message');
    Route::get('messages', [MessageController::class, 'index'])->name('message.index');
    Route::get('message', fn () => redirect()->route('admin.message.index'));
});
