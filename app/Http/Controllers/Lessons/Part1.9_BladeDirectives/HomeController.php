<?php

namespace App\Http\Controllers;


use App\Models\Post;

class HomeController extends Controller
{

    public function index()
    {
        $posts = Post::query()->orderBy('id', 'desc')->get();
        $title = 'Home page';

        return view('home', compact('title', 'posts'));
    }
}
