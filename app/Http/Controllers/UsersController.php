<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class UsersController
{
    public function create(): View|Application|Factory
    {
        return view('users.create');
    }

    public function show(User $user): View|Application|Factory
    {
        return view('users.show', compact('user'));
    }
}
