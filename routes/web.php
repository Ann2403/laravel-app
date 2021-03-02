<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Создание путей:
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/', function () {
    return '<h1>Hello, World!</h1>';
});*/

Route::get('/', function () {
    $res = 2 + 3;
    $name = 'Andrey';
    /* Способы передачи аргументов в "вид" (файл) home:
    return view('home') -> with('var', $res);
    return view('home', ['res' => $res, 'name' => $name]);
    */
    return view('home', compact('res', 'name'));
});

Route::get('/about', function () {
    return '<h1>About page!</h1>';
});
