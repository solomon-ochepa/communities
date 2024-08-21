<?php

use Illuminate\Support\Facades\Route;
use Modules\Visitor\app\Http\Controllers\Admin\VisitController;
use Modules\Visitor\app\Http\Controllers\Admin\VisitorController;
use Modules\Visitor\app\Http\Controllers\Admin\VisitorVisitController;

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
    // Visitors
    Route::resource('visitor', VisitorController::class)->except(['index'])->names('visitor');
    Route::get('visitors', [VisitorController::class, 'index'])->name('visitor.index');
    Route::get('visitor', fn () => redirect(route('admin.visitor.index')));

    // Visits
    Route::resource('visit', VisitController::class)->except(['index'])->names('visit');
    Route::get('visits', [VisitController::class, 'index'])->name('visit.index');
    Route::get('visit', fn () => redirect()->route('admin.visit.index'));

    // Visitor's Visits
    Route::resource('visitor/{visitor}/visit', VisitorVisitController::class)->only(['show', 'destroy'])->names('visitor.visit');
    Route::get('visitors/{visitor}/visits', [VisitorVisitController::class, 'index'])->name('visitor.visit.index');
    Route::get('visitor/{visitor}/visit', fn () => redirect(route('admin.visitor.visit.index')));

    // if module: apartment

    // // Apartment->Visitors
    // Route::resource('apartment/{apartment}/visitor', ApartmentVisitorController::class)->except(['index'])->names('apartment.visitor');
    // Route::get('apartment/{apartment}/visitors', [ApartmentVisitorController::class, 'index'])->name('apartment.visitor.index');
    // Route::get('apartment/{apartment}/visitor', fn () => redirect()->route('admin.apartment.visitor.index'));

    // // Apartment->Visitors
    // Route::resource('apartment/{apartment}/visitor', ApartmentVisitorController::class)->except(['index'])->names('apartment.visitor');
    // Route::get('apartment/{apartment}/visitors', [ApartmentVisitorController::class, 'index'])->name('apartment.visitor.index');
    // Route::get('apartment/{apartment}/visitor', fn () => redirect()->route('admin.apartment.visitor.index'));
});
