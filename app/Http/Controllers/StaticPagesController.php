<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\View\View;
use PHPUnit\TextUI\Application;

class StaticPagesController
{
    public function home(): View|Application|Factory
    {
        return view('static_pages/home');
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
