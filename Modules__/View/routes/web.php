<?php

use Illuminate\Support\Facades\Route;
use Modules\View\app\Http\Controllers\ViewController;

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
    Route::resource('view', ViewController::class)->except(['index'])->names('view');
    Route::get('views', [ViewController::class, 'index'])->name('view.index');
    Route::get('view', fn () => redirect()->route('admin.view.index'));
});
