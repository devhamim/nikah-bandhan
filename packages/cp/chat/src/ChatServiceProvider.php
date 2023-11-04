<?php

namespace Cp\Chat;

use Illuminate\Support\ServiceProvider;

class ChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //routes.php
        if (! $this->app->routesAreCached())
        {
            require __DIR__.'/routes.php';
        }

        //views
        if (is_dir(base_path() . '/resources/views/cp/chat')) {
            $this->loadViewsFrom(base_path() . '/resources/views/cp/chat', 'chat');
        } else {
            $this->loadViewsFrom(__DIR__.'/views', 'chat');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //controller
        $this->app->make('Cp\Chat\Controllers\ChatController');


        //config
        $this->mergeConfigFrom(__DIR__.'/config/chat.php', 'chat');
    }
}
