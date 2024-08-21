<?php

use Illuminate\Support\Facades\Route;
use Modules\Tenant\app\Http\Controllers\Admin\TenantController;

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
    // Tenants
    Route::resource('tenant', TenantController::class)->except(['index'])->names('tenant');
    Route::get('tenants', [TenantController::class, 'index'])->name('tenant.index');
    Route::get('tenant', fn () => redirect(route('admin.tenant.index')));
});
