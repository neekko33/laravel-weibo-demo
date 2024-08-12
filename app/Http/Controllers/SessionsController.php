<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    public function create(): View|Factory|Application
    {
        return view('sessions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', 'You are now logged in');
            $fallback = route('users.show', [Auth::user()]);
            return redirect()->intended($fallback);
        } else {
            session()->flash('danger', 'email or password is incorrect');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();
        session()->flash('success', 'You are now logged out');
        return redirect('login');
    }
}
