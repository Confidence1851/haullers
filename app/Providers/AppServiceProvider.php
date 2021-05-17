<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


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
        Schema::defaultStringLength(191);
        view()->composer('*',function($view){
            // $user = optional(auth()->user());
            $view->with([
                'logo_img' => url('/').env("RESOURCE_URL").'/logo.png',
                'web_assets' => my_asset("web"),
                'dashboard_assets' => my_asset("dashboard"),
                'admin_source' => url('/').env("RESOURCE_URL").'/admin',
                // 'user_avatar' => empty($user->avatar) ? url('/').env("RESOURCE_URL").'/dashboard/img/avatar/2.jpg' : asset($user->avatar)
            ]);
        });

    }
}
