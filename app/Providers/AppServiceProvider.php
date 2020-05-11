<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Cookie;
use Session;

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
        //
//      Session::put('user','用户');
//		$username=Session::get('user','用户');
    }
}
