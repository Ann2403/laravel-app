<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rubric;
use App\Models\Tag;

class HomeController extends Controller
{

    public function index()
    {

        //СВЯЗЬ ОДИН К ОДНОМУ
        /*
        //выбираем запись с идентификатором 2
        $post = Post::query()->find(1);
        //обращаемся к виртуальному свойству для получения title связаной рубрики
        dump($post->rubric->title);

        $rubric = Rubric::query()->find(3);
        dump($rubric->post->title);
        */

        //СВЯЗЬ ОДИН К МНОГИМ
        /*$rubric = Rubric::query()->find(3);
        //распечатаем массив с постами
        //dump($rubric->posts);
        $posts = Rubric::query()->find(3)->posts;
        //получим только название постов и их рубрик с массива
        foreach ($posts as $post) {
            //при "ленивой загрузке" выполняются дополнительные sql запросыв количестве =
            //количестве полученых записей
            dump($post->title, $post->rubric->title);
        }

        $post = Post::query()->find(7);
        dump($post->rubric->title);
        //получим только название постов и их рубрик с массива
        $posts = Post::query()->with('rubric')->where('id', '>', '2')->get();
        foreach ($posts as $post) {
            //при "жадной загрузке" мы говорим(при помощи метода with) какую связь загрузить сразу
            // и сокращаем таким образом количество sql запросов
            dump($post->title, $post->rubric->title);
        }*/

        //СВЯЗЬ МНОГИЕ К МНОГИМ
        /*$post = Post::query()->find(7);
        //выводим название поста
        dump($post->title);
        //проходимся массивом по тегам связаными виртуальным свойством tags
        foreach ($post->tags as $tag) {
            //и выводим их названия
            dump($tag->title);
        }

        $tag = Tag::query()->find(3);
        //выводим название тега
        dump($tag->title);
        //проходимся массивом по постам связаными виртуальным свойством posts
        foreach ($tag->posts as $post) {
            //и выводим их названия
            dump($post->title);
        }*/

        //return view('home', ['res' => 30, 'name' => 'Andrey']);
    }
}
