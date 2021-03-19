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

use App\Http\Controllers\HomeController;
//При переходе на этот маршрут вызовится метод index класса(контролера) HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/create', [HomeController::class, 'create'])->name('posts.create');
Route::post('/', [HomeController::class, 'store'])->name('posts.store');

use App\Http\Controllers\PageController;
Route::get('/page/about', [PageController::class, 'show'])->name('page.about');

//Route::get('/send', [\App\Http\Controllers\ContactController::class, 'send']);
Route::match(['get', 'post'], '/send', [\App\Http\Controllers\ContactController::class, 'send'])->name('send');


use App\Http\Controllers\UserController;
//обработка маршрутов посредником 'guest' (когда пользователь не авторизован)
Route::group(['middleware' => 'guest'], function () {
    //Регистрация пользователя
    Route::get('/registration', [UserController::class, 'registration'])->name('registration');
    Route::post('/registration', [UserController::class, 'storeReg'])->name('registration.store');

    //Авторизация пользователя
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'storeLog'])->name('login.store');
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

//Админские маршруты
use App\Http\Controllers\Admin\MainController;
//middleware - обработка маршрутов посредником 'admin'
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/', [MainController::class, 'index'])->name('admin');
});



Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
});
