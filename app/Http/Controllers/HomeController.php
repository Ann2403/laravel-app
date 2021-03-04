<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        //массив с глобальными переменными среды
        dump($_ENV);
        //функция хелпер для просмотра или установки(вторым параметром передается значение) глобальных переменных среды
        dump(env('DB_DATABASE'));
        //функция хелпер для просмотра либо установки конфиграций приложения
        dump(config('app.timezone'));
        //возвращаем представление(страницу) home
        return view('home', ['res' => 'I love you!', 'name' => 'Andrey']);
    }

    public function test()
    {
        return __METHOD__;
    }
}
