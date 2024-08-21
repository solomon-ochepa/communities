<?php

use Illuminate\Support\Facades\Route;
use Modules\Like\app\Http\Controllers\LikeController;

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
    Route::resource('like', LikeController::class)->except(['index'])->names('like');
    Route::get('likes', [LikeController::class, 'index'])->name('like.index');
    Route::get('like', fn () => redirect()->route('admin.like.index'));
});
