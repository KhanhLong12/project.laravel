<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use View;
use App\Models\Order;
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
        // $cate=Category::get();
        // Cache::put('cate',$cate,60*60);
        // $categories = Cache::remember('cate',60, function() {
        //     return $categories=Category::get();
        // });
        // $categories = Category::get();
        $dembill = Order::Where('status',1)->count('status');
        // dd($dembill);
        $categories1 = Category::get();
        // dd($categories1);
        $categories = Category::WHERE('parent_id', 0)->get();
        Cache::put('categories', $categories,50*5);
        View::share([
            'categories' => $categories,
            'categories1' => $categories1,
            'dembill' => $dembill
        ]);
    }
}
