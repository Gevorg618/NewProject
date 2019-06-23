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
        \App\Contracts\UsersInterface::class;
        \App\Repositories\UsersRepository::class;
        \App\Contracts\ProductsInterface::class;
        \App\Repositories\ProductsRepository::class;
        \App\Contracts\OrdersInterface::class;
        \App\Repositories\OrdersRepository::class;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
