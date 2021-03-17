<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        /* Создание кук (время указывается в минутах)
        Cookie::queue('name', 'Andrey', 5);
        Распечатка кук
        dump(Cookie::get('name'));
        Удаление кук
        Cookie::queue(Cookie::forget('name'));
        Распечатка кук
        dump($request->cookie('name'));*/

        /*
        //Помещение даннх в кэш (время указывается в секундах)
        Cache::put('testKey', 'testValue', 60);
        //Безсрочное кєширование
        Cache::forever('myLove', 'Andrey');
        //Распечатка кэша по ключу
        dump(Cache::get('myLove'));
        //Получаем данные и удаляем их
        dump(Cache::pull('testKey'));
        //Удаление данных
        dump(Cache::forget('testKey'));
        //Полное очищение кэша
        dump(Cache::flush());*/

        //Проверяем наличие кэша по ключу
        if (Cache::has('posts')) {
            $posts = Cache::get('posts');
        } else{
            //Делаем запрос к БД на вывод постов в обратном порядке
            $posts = Post::query()->orderBy('id', 'desc')->get();
            //Тоже безсрочное кэширование
            Cache::put('posts', $posts);
        }

        $title = 'Home page';

        return view('home', compact('title', 'posts'));
    }

    public function create()
    {
        $title = 'Create posts';
        $rubrics = Rubric::query()->pluck('title', 'id')->all();
        return view('create', compact('title', 'rubrics'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer'
        ]);

        Post::query()->create($request->all());

        $request->session()->flash('success', 'Save - OK');
        return redirect()->route('home');
    }
}
