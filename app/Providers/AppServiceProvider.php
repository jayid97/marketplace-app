<?php

namespace App\Providers;

use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        if(empty(Auth::user()->id))
        {
            View::composer('layouts.components.header', function ($view) {
                $view->with('count', 0);
            });
        }else{
            View::composer('layouts.components.header', function ($view) {
                $view->with('count', Rating::where('star', 0)->orWhere('buyer_id', Auth::user()->id)->count());
            });
        }
       
}
}
