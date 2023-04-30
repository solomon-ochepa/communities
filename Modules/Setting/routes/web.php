<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\app\Http\Controllers\SettingController;

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
    Route::resource('setting', SettingController::class)->except(['index'])->names('setting');
    Route::get('settings', [SettingController::class, 'index'])->name('setting.index');
    Route::get('setting', fn () => redirect(route('admin.setting.index'), 302))->name('setting.fallback')->fallback();
});
