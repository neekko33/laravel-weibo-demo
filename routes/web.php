<?php

use App\Http\Controllers\FollowersController;
use App\Http\Controllers\StatusesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;

Route::get('/', [StaticPagesController::class, 'home'])->name('home');
Route::get('/help', [StaticPagesController::class, 'help'])->name('help');
Route::get('/about', [StaticPagesController::class, 'about'])->name('about');

Route::get('signup', [UsersController::class, 'create'])->name('signup');
Route::resource('users', UsersController::class);

Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store'])->name('login');
Route::delete('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::resource('statuses', StatusesController::class, ['only' => ['store', 'destroy']]);

Route::get('/users/{user}/followings', [UsersController::class, 'followings'])->name('users.followings');
Route::get('/users/{user}/followers', [UsersController::class, 'followers'])->name('users.followers');

Route::post('/users/followers/{user}', [FollowersController::class, 'store'])->name('followers.store');
Route::delete('users/followers/{user}', [FollowersController::class, 'destroy'])->name('followers.destroy');
