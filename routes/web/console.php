<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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
