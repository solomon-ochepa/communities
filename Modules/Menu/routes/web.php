<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\app\Http\Controllers\Admin\MenuController;

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
    Route::resource('menu', MenuController::class)->except(['index'])->names('menu');
    Route::get('menus', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu', fn () => redirect(route('admin.menu.index')));
});
