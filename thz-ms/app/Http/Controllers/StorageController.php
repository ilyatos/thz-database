<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StorageController extends Controller
{
    /**
     * Show the application dashboard
     *
     * @return View
     */
    public function index(): View
    {
        return view('app');
    }
}
