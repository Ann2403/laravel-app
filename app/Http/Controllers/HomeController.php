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
        // выводим пост по 6 штук (пагинация)
        $posts = Post::query()->orderBy('id', 'desc')->paginate(6);
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
