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
    Route::resource('comment', CommentController::class)->except(['index'])->names('comment');
    Route::get('comments', [CommentController::class, 'index'])->name('comment.index');
    Route::get('comment', fn () => redirect()->route('admin.comment.index'));
});
