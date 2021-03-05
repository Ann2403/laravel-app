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
Route::get('/', [HomeController::class, 'index']);

Route::fallback(function () {
    abort(404, 'Oops! Page not found...');
});
