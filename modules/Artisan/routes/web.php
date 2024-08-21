<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::middleware(['can:artisan.http'])->name('artisan.')->prefix('artisan')->group(function () {
    Route::get('/', fn () => redirect(route('artisan.optimize.clear')));

    Route::get('/optimize:clear', function (Request $request) {
        $query = "optimize:clear";
        Artisan::call($query);

        session()->flash('status', 'Artisan command successful!\n' . $query);
        return redirect(route('dashboard'));
    })->name('optimize.clear');

    Route::get('/storage:link', function (Request $request) {
        $query = "storage:link";
        Artisan::call($query);

        session()->flash('status', 'Artisan command successful!\n' . $query);
        return redirect(route('dashboard'));
    })->name('storage.link');

    Route::get('/migrate:refresh', function (Request $request) {
        $query = "migrate:refresh -n";
        Artisan::call($query);

        session()->flash('status', 'Artisan command successful!\n' . $query);
        return redirect(route('dashboard'));
    })->name('migrate.refresh');

    Route::get('/migrate:fresh', function (Request $request) {
        $query = "migrate:fresh -n";
        Artisan::call($query);

        session()->flash('status', 'Artisan command successful!\n' . $query);
        return redirect(route('dashboard'));
    })->name('migrate.refresh');

    Route::get('/migrate', function (Request $request) {
        $query = "migrate -n";
        Artisan::call($query);

        session()->flash('status', 'Artisan command successful!\n' . $query);
        return redirect(route('dashboard'));
    })->name('migrate.refresh');
});
