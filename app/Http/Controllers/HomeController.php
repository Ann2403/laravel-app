<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    public function index()
    {
        $title = 'Home page';
        $data1 = range(1, 20);
        $data2 = [
            'title' => 'Title',
            'content' => 'Content',
            'keys' => 'Keywords'
        ];
        return view('home', compact('title', 'data1', 'data2'));
    }
}
