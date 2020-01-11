<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @param Category $category
     *
     * @return View
     */
    public function spectra(Category $category): View
    {
        return view('home', [
            'categories' => Category::orderBy('title')->get(),
            'spectra' => $category->spectra()->orderBy('title')->get(),
        ]);
    }
}
