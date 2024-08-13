<?php

use App\Http\Controllers\FollowersController;
use App\Http\Controllers\StatusesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SessionsController;

Route::controller(StaticPagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/help', 'help')->name('help');
    Route::get('/about', 'about')->name('about');
});

Route::resource('users', UsersController::class);

Route::controller(UsersController::class)->group(function () {
    Route::get('signup', 'create')->name('signup');
    Route::get('/users/{user}/followings', 'followings')->name('users.followings');
    Route::get('/users/{user}/followers', 'followers')->name('users.followers');
});

Route::controller(SessionsController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store')->name('login');
    Route::delete('logout', 'destroy')->name('logout');
});

Route::resource('statuses', StatusesController::class, ['only' => ['store', 'destroy']]);

Route::post('/users/followers/{user}', [FollowersController::class, 'store'])->name('followers.store');
Route::delete('users/followers/{user}', [FollowersController::class, 'destroy'])->name('followers.destroy');
