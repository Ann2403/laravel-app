<?php

namespace App\Providers;

use App\Models\Rubric;
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

         /*//распечатка всех sql запросов
          DB::listen(function ($query) {
            dump($query->sql);
            //второй аргумент $query->bindings покажет что возвращает запрос
          });*/

        //регестрируем компосер
        //передаем в компонент footer все рубрики
        view()->composer('layouts.footer', function ($view) {
            $view->with('rubrics', Rubric::all());
        });

    }
}
