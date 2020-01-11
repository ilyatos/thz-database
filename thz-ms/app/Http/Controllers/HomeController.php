<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard
     *
     * @return View
     */
    public function index(): View
    {
        return view('home', [
            'categories' => Category::orderBy('title')->get(),
        ]);
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return view('about');
    }
}
