<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

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
        Paginator::useBootstrap();

        view()->composer('front.layouts.sidebar', function($view){
            $view->with('popular_posts', Post::orderBy('view', 'desc')->limit(5)->get());

            if(Cache::has('categories')){
                $categories = Cache::get('categories');
            } else {
                $categories =  Category::withCount('posts')->orderBy('posts_count', 'desc')->get();
                Cache::put('categories', $categories, 2);
            }
            $view->with('categories', $categories);
        });

        view()->composer('front.layouts.menu', function($view){
            $view->with('categories', Category::orderBy('id', 'desc')->get());
        });
    }
}
