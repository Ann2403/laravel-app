<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        //возвращаем представление(страницу) home
        return view('home', ['res' => 'I love you!', 'name' => 'Andrey']);
    }

    public function test()
    {
        return __METHOD__;
    }
}
