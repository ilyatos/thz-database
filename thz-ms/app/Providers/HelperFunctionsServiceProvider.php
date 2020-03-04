<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperFunctionsServiceProvider extends ServiceProvider
{
    /**
     * Register helper functions
     *
     * @return void
     */
    public function register(): void
    {
        $file = app_path('Helpers/functions.php');

        if (file_exists($file)) {
            require_once($file);
        }
    }

    /**
     * Bootstrap services
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
