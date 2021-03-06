<?php

namespace App\Providers;

use App\Category;
use App\News;
use App\User;
use App\View_news;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::select(['id','name_en', 'name_hy', 'name_ru'])->orderBy('id', 'asc')->get());
        }
        if (Schema::hasTable('users')) {
            View::share('user_a', User::select(['id','name', 'email','status_id'])->where('status_id',1)->take(3)->get());
        }

        if (Schema::hasTable('news')) {
            View::share('news_show', News::select(['id','avatar','title_ru', 'title_en','title_hy','short_description_en','short_description_hy','short_description_ru'])->orderBy('id','desc')->take(5)->get());
        }
        if (Schema::hasTable('view_news')) {
            View::share('news_top', News::withCount('view_news')->orderBy('view_news_count','desc')->take(5)->get());
        }

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
