<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);

        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

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
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        Auth::login($user);
        session()->flash('success', 'User created successfully');
        return redirect()->route('users.show', [$user]);
    }

    public function edit(User $user): View|Application|Factory
    {
        Gate::authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request): RedirectResponse
    {
        Gate::authorize('update', $user);
        $request->validate([
            'name' => 'required|max:50',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [];
        $data['name'] = $request['name'];
        if ($request['password']) {
            $data['password'] = bcrypt($request['password']);
        }
        $user->update($data);

        session()->flash('success', 'User updated successfully');

        return redirect()->route('users.show', [$user]);
    }
}
