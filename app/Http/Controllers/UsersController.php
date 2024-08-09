<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class UsersController
{
    public function create(): View|Application|Factory
    {
        return view('users.create');
    }
}
