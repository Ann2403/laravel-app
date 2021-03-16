<?php

namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index()
    {
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
        return redirect()->route('home');
    }
}
