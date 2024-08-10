<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
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

    public function store(Request $request): void
    {
        $request->validate([
            'name' => 'required|unique:users|max:50',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
        return;
    }
}
