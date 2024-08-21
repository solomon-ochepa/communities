<?php

use Illuminate\Support\Facades\Route;
use Modules\Occupant\App\Http\Controllers\OccupantController;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('occupants', OccupantController::class)->except(['index'])->names('occupants');
    Route::get('occupants', [OccupantController::class, 'index'])->name('occupants.index');
});
