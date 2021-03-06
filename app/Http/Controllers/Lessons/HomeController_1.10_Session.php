<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        /*Запись данных в сессии
         $request->session()->put('test', 'Test value');
         session(['testArray' => [
            ['id' => 1, 'test' => 'Test value 1'],
            ['id' => 2, 'test' => 'Test value 2'],
            ['id' => 3, 'test' => 'Test value 3']
        ]]);

        Чтение данных с сессии
        dump(session('test'));
        dump(session('testArray')[1]['test']);
        dump($request->session()->get('testArray')[0]['test']);

        Добавление данных в сессию не перезаписывая/удаляя предыдущие
        $request->session()->push('testArray', ['id' => 4, 'test' => 'Test value 4']);

        Удаление данных с сессии:
        одновременно извлекает и удаляет значеие из сессии
        dump($request->session()->pull('test'));
        удаление части данных
        $request->session()->forget('test');
        удаление всех данных
        $request->session()->flush();
        //dump($request->session()->all());
        dump(session()->all());*/

        

        $posts = Post::query()->orderBy('id', 'desc')->get();
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
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer'
        ]);


       /* Настройка сообщений об ошибке валидации
       $rules = [
            'title' => 'required|min:5|max:100',
            'content' => 'required',
            'rubric_id' => 'integer'
        ];
        $messages = [
            'title.required' => 'Заполните поле "Title"',
            'title.min' => 'Поле "Title" должно содержать больше 5 символов',
            'content.required' => 'Заполните поле "Content"',
            'rubric_id.integer' => 'Выберите рубрику из предложеных'
        ];
        $validator = Validator::make($request->all(), $rules, $messages)->validate();*/

        Post::query()->create($request->all());

        $request->session()->flash('success', 'Save - OK');
        return redirect()->route('home');
    }
}
