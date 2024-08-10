<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:users|max:50',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        session()->flash('success', 'User created successfully');
        return redirect()->route('users.show', [$user]);
    }
}
