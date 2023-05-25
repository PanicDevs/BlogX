<?php

namespace Modules\File\Providers;

use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(): void
    {
       $this->registerRepositories();
    }

    /**
     * Register module repositories.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        //TODO: Init module repositories.
        //$this->app->bind(C1, C2);
    }
}
