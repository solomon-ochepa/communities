<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicle\app\Http\Controllers\Admin\VehicleController;
use Modules\Vehicle\app\Http\Controllers\Admin\VehicleMakeController;
use Modules\Vehicle\app\Http\Controllers\Admin\VehicleTrimController;

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
    Route::resource('vehicle', VehicleController::class)->except(['index'])->names('vehicle');
    Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::get('vehicle', fn () => redirect()->route('admin.vehicle.index'));

    // Vehicle Trims
    Route::prefix('vehicle')->name('vehicle.')->group(function () {
        Route::resource('trim', VehicleTrimController::class)->except(['index'])->names('trim');
        Route::get('trims', [VehicleTrimController::class, 'index'])->name('trim.index');
        Route::get('trim', fn () => redirect()->route('admin.vehicle.trim.index'));
    });

    // Vehicle Models
    Route::prefix('vehicle')->name('vehicle.')->group(function () {
        Route::resource('model', VehicleMakeController::class)->except(['index'])->names('model');
        Route::get('models', [VehicleController::class, 'index'])->name('model.index');
        Route::get('model', fn () => redirect()->route('admin.vehicle.model.index'));
    });

    // Vehicle Makes
    Route::prefix('vehicle')->name('vehicle.')->group(function () {
        Route::resource('make', VehicleMakeController::class)->except(['index'])->names('make');
        Route::get('makes', [VehicleController::class, 'index'])->name('make.index');
        Route::get('make', fn () => redirect()->route('admin.vehicle.make.index'));
    });

    // Vehicle Types
    Route::prefix('vehicle')->name('vehicle.')->group(function () {
        Route::resource('type', VehicleMakeController::class)->except(['index'])->names('type');
        Route::get('types', [VehicleController::class, 'index'])->name('type.index');
        Route::get('type', fn () => redirect()->route('admin.vehicle.type.index'));
    });
});
