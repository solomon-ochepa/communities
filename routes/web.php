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

// Artisan
Route::middleware(['can:commands'])->prefix('artisan')->group(function () {
    Route::get('/', function () {
        Artisan::call("optimize:clear");
        session()->flash('status', ['success: optimize:clear']);

        return back();
    });

    Route::get('/storage', function () {
        Artisan::call("storage:link");
        session()->flash('status', ['success: storage:link']);

        return back();
    });

    Route::get('/migrate', function (Request $request) {
        if ($request->has('refresh')) {
            Artisan::call("migrate:refresh -n");
            session()->flash('status', ['success: migrate:refresh']);
        } elseif ($request->has('fresh')) {
            Artisan::call("migrate:fresh -n");
            session()->flash('status', ['success: migrate:fresh']);
        } else {
            Artisan::call("migrate -n");
            session()->flash('status', ['success: migrate']);
        }

        return redirect(route('dashboard'));
    });
});
