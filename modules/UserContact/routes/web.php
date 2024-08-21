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
    Route::resource('usercontact', UserContactController::class)->except(['index'])->names('usercontact');
    Route::get('usercontacts', [UserContactController::class, 'index'])->name('usercontact.index');
    Route::get('usercontact', fn () => redirect()->route('admin.usercontact.index'));
});
