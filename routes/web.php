<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\RecordsController;
use Illuminate\Support\Facades\Route;

// routes/web.php
Route::get('page/{number}', [PageController::class, 'show'])->where('number', '[0-9]+');
Route::get('records/', [RecordsController::class, 'show']);

