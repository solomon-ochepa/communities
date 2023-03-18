<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Office\LocalizationController;

Auth::routes(['verify' => false]);

require_once('web/guest.php');
require_once('web/office.php');
require_once('web/console.php');

Route::get('office/lang/{locale}', [LocalizationController::class, 'index'])->middleware([''])->name('office.lang.index');
