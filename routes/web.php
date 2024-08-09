<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;

Route::get('/', [StaticPagesController::class, 'home']);
Route::get('/help', [StaticPagesController::class, 'help']);
Route::get('/about', [StaticPagesController::class, 'about']);

