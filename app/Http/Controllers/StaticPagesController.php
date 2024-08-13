<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class StaticPagesController extends Controller
{
    public function home(): View|Application|Factory
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feed_items'));
    }

    public function help(): View|Application|Factory
    {
        return view('static_pages/help');
    }

    public function about(): View|Application|Factory
    {
        return view('static_pages/about');
    }
}
