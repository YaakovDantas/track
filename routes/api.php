<?php

use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;


Route::prefix('tracks')->group(function () {

    Route::get('/', [TrackController::class, 'index']);
    Route::post('/', [TrackController::class, 'store']);
});