<?php

use Illuminate\Support\Facades\Route;
use Modules\Occupant\App\Http\Controllers\OccupantController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('occupants', OccupantController::class)->names('occupants');
});
