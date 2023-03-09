<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Office\LocalizationController;

Auth::routes(['verify' => false]);

Route::redirect('/', '/office/dashboard')->middleware('backend_permission');
Route::redirect('/office', '/DashboardControllermin/dashboard')->middleware('backend_permission');

Route::group(['prefix' => 'office', 'middleware' => ['installed'], 'namespace' => 'Office', 'as' => 'office.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm']);
});

Route::get('office/lang/{locale}', [LocalizationController::class, 'index'])->middleware(['installed'])->name('office.lang.index');

require_once('web/office.php');
require_once('web/guest.php');
