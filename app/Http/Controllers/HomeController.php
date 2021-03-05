<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {

        /* ЗАПОЛНЕНИЕ ДАННЫХ
        //создаем модель
        $post = new Post();
        //заполняем поля title и content
        $post->title = 'Post 4';
        $post->content = 'Lorem ipsum 4';
        //сохраняем изменения
        $post->save();

        Post::query()->create(['title' => 'Post 6', 'content' => 'Lorem ipsum 6']);

        $post = new Post();
        $post->fill(['title' => 'Post 8', 'content' => 'Lorem ipsum 8']);
        $post->save();*/

        /*ВЫВОД ДАННЫХ
        $data = Country::all();
        //с моделями можно общаться через конструктор запросов тоже
        $data = Country::query()->limit(5)->get();

        //получаем запись по идентификатору
        $data = City::query()->find(5);
        $data = Country::query()->find('AGO');

        dd($data);*/

        /*ОБНОВЛЕНИЕ ДАННЫХ
        $post = Post::query()->find(3);
        $post->title = 'Post 3';
        $post->save();
        //массовое изменение данных
        Post::query()->where("id", ">", 3)->update(['updated_at' => NOW()]);*/

        /*УДАЛЕНИЕ ДАННЫХ
        //при отсутствии заданного идентификатора будет ошибка,
        //т.к. возвращается null, а у него нету никаких методов
        $post = Post::query()->find(5);
        $post->delete();
        //в данном примере ошибки не будет, т.к. мы обращаемся к объекту которого нету
        //можно передавать в виде массива либо строки несколько идентификаторов
        Post::destroy(8);*/

        //return view('home', ['res' => 30, 'name' => 'Andrey']);
    }
}
