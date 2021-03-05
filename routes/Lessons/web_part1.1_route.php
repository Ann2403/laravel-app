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
    /************* СПОСОБЫ ПЕРЕДАЧИ АРГУМЕНТОВ в "вид" (файл) home:
    return view('home') -> with('var', $res);
    return view('home', ['res' => $res, 'name' => $name]);
     */
    return view('home', compact('res', 'name'));
}) -> name('home');

Route::get('/about', function () {
    return '<h1>About page!</h1>';
});

/**************************** ОТПРАВКА ФОРМЫ:
 * со страницы "/contact" на '/send-email'
Route::get('/contact', function () {
return view('contact');
});

Route::post('/send-email', function () {
if(!empty($_POST)) {
dump($_POST);
}
return 'Send';
});

 * на странице "/contact"
Route::match(['post', 'get'], '/contact', function () {
return view('contact');
});

Поддерживаем все виды запросов
Route::any('/contact', function () {
return view('contact');
});

 **************************** ИМЕНОВАННЫЕ МАРШРУТЫ
 */

Route::match(['post', 'get', 'put'], '/contact', function () {
    return view('contact');
}) -> name('contact');

// Короткая запись роута, если нужно указать только вид.
// В таком варианте передать параметры можно только массивом
Route::view('/test', 'test', ['test' => 'Test page']);

//Перенаправление на другую страницу
Route::redirect('/test', '/contact', 301);

/********* Автоматическая передача статуса 301
Route::permanentRedirect('/test', '/contact');

 ******************** Передача аргументов в url
Route::get('/posts/{id}', function ($id) {
return "Post $id";
});

Route::get('post/{id}/{slug}', function ($id, $slug) {
return "Post $id | $slug";
}) -> where(['id' => '[0-9]+', 'slug' => '[A-Za-z0-9-]+']);*/

//можно укать патерны глобально в "app/Providers/RouteServiceProvider.php" (38 строка)
//и указать необязательным аргумент slug укзав начение по умолчанию
Route::get('post/{id}/{slug?}', function ($id, $slug = null) {
    return "Post $id | $slug";
}) -> name('post'); //этот роут доступен через имя: post

/*********  ГРУПИРОВКА ПРАВИЛ
 * добавляем префикс к каждому url внутри данного Route
 *
для того чтобы двум роутам дать одинаковое имя(так делать не рекомендуется)
можно задать имя группе в которой находится один из роутов и тогда имя роута уже
уже будет доступно через имя группы + имя роута иначе следующее имя перезаписывает предыдущее
 */
Route::prefix('admin') -> name('admin.') -> group(function () {
    Route::get('/posts', function () {
        return 'Posts list';
    });

    Route::get('/post/creature', function () {
        return 'Posts creature';
    });

    Route::get('/post/{id}/edit', function ($id) {
        return "Posts $id edit";
    }) -> name('post'); //этот роут доступен через имя: admin.post
});
/***************** МЕТОДЫ ПОДМЕНЫ ПЕРЕДАЧИ ДАННЫХ
смотреть в 'resources/views/contact.blade.php'
 ************************* ПЕРЕНАПРАВЛЕНИЕ ВСЕХ НЕ СУЩЕСТВУЮЩИХ ПУТЕЙ
 */

Route::fallback(function () {
    //return redirect() -> route('home');
    //Для создание своей страницы 404 создаем папку errors с файлом "404.blade.php" в resources/views
    abort(404, 'Oops! Page not found...');
});
