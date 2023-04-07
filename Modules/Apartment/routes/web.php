<?php

use Illuminate\Support\Facades\Route;
use Modules\Apartment\app\Http\Controllers\Admin\ApartmentController;
use Modules\Apartment\app\Http\Controllers\Admin\ApartmentRoomController;

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
    // Apartments
    Route::resource('apartment', ApartmentController::class)->except(['index'])->names('apartment');
    Route::get('apartments', [ApartmentController::class, 'index'])->name('apartment.index');
    Route::get('apartment', fn () => redirect()->route('admin.apartment.index'));

    // Apartment->Rooms
    Route::resource('apartment/{apartment}/room', ApartmentRoomController::class)->except(['index'])->names('apartment.room');
    Route::get('apartment/{apartment}/rooms', [ApartmentRoomController::class, 'index'])->name('apartment.room.index');
    Route::get('apartment/{apartment}/room', fn () => redirect()->route('admin.apartment.room.index'));

    // // Apartment->Tenants
    // Route::resource('apartment/{apartment}/tenant', ApartmentResidentController::class)->except(['index'])->names('apartment.tenant');
    // Route::get('apartment/{apartment}/tenants', [ApartmentResidentController::class, 'index'])->name('apartment.tenant.index');
    // Route::get('apartment/{apartment}/tenant', function () {
    //     return redirect()->route('admin.apartment.tenant.index');
    // });
});
