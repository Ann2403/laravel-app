<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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

         //распечатка всех sql запросов
          DB::listen(function ($query) {
            dump($query->sql);
            //второй аргумент $query->bindings покажет что возвращает запрос
          });

    }
}
