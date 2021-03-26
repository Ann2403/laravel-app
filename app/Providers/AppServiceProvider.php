<?php

namespace App\Providers;

use App\Models\Rubric;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

        //для отображения пагинации стилями Bootstrap
        //по умолчания используется Tailwind
        Paginator::useBootstrap();

         //распечатка всех sql запросов
          DB::listen(function ($query) {
            /*dump($query->sql);
            //второй аргумент $query->bindings покажет что возвращает запрос
            //логируем sql запросы(лучше чем первій вариант, т.к. не происходит отправка заголока)
            //channel - указывает какой канал использовать*/
              Log::channel('sqlloqs')->info($query->sql);
          });

        //регестрируем компосер
        //передаем в компонент footer все рубрики
        view()->composer('layouts.footer', function ($view) {
            $view->with('rubrics', Rubric::all());
        });

    }
}
