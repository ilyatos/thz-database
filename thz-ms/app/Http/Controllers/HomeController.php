<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home', [
            'categories' => Category::orderBy('title')->get(),
        ]);
    }

    /**
     * @return Renderable
     */
    public function about(): Renderable
    {
        return view('about');
    }
}
