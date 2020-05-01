<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class AboutController extends Controller
{
    public function __invoke(): Response
    {
        return $this->response->view('web.static.about');
    }
}
