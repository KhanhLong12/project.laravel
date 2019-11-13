<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use View;
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
        $categories1 = Category::get();
        // dd($categories1);
        $categories = Category::WHERE('parent_id', 0)->get();
        View::share([
            'categories' => $categories,
            'categories1' => $categories1,
        ]);
    }
}
