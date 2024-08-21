<?php

use Illuminate\Support\Facades\Route;
use Modules\Community\app\Http\Controllers\CommunityController;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('communities', CommunityController::class)->except(['index'])->names('communities');
    Route::get('communities', [CommunityController::class, 'index'])->name('communities.index');
    Route::get('communities', fn () => redirect()->route('admin.communities.index'));
});
