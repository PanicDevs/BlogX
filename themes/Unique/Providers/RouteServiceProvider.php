<?php

namespace Themes\Unique\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapPublicRoutes(theme_path() . "/routes/web.php");
    }

    /**
     * Map public routes.
     *
     * @param string $path
     *
     * @return void
     */
    private function mapPublicRoutes(string $path): void
    {
        if (!file_exists($path))
        {
            return;
        }

        Route::group(
            [
                'middleware' => ['web'],
            ],
            fn() => require_once $path,
        );
    }
}
