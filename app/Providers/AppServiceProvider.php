<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Contracts\NewsControllerInterface', 'App\Services\NewsService');
        $this->app->bind('App\Contracts\HomeDbControllerInterface', 'App\Services\HomeService');
        $this->app->bind('App\Contracts\AdminControllerInterface', 'App\Services\AdminService');
        $this->app->bind('App\Contracts\CategoryControllerInterface', 'App\Services\CategoryService');
        $this->app->bind('App\Contracts\UserControllerInterface', 'App\Services\UserService');
    }
}
