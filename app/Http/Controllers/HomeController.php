<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        /*получаем таблицу country через конструктор запросов
        $data = DB::table('country')->get();*/

        /*получаем из таблицы не все данные, а ограничиваемся 5 записями
        $data = DB::table('country')->limit(5)->get();*/

        /*получаем только колонки 'Name', 'Code' 5 записей
        $data = DB::table('country')->select('Name', 'Code')->limit(5)->get();*/

        /*получаем колонки 'Name', 'Code' только одной записи
        $data = DB::table('country')->select('Name', 'Code')->first();*/

        /*получаем колонки 'Name', 'Code' сортированй таблицы по колонке 'Code' в обратном порядке
        $data = DB::table('country')->select('Name', 'Code')->orderBy('Code', 'desc')->first();*/

        /*получаем колонки 'Name', 'ID' по первичному ключу
        $data = DB::table('city')->select('Name', 'ID')->find(2);*/

        /*получаем колонки 'Name', 'ID':
                                        где колонка 'ID' = 2('=' по умолчанию - его можно не указывать)
        $data = DB::table('city')->select('Name', 'ID')->where('ID', 2)->get();
                                        где колонка 'ID' меньше 5
        $data = DB::table('city')->select('Name', 'ID')->where('ID', '<', 5)->get();
                                        где 'ID' больше 1 и меньше 5(несколько условий прописываются в массиве внутри общего массива)
        $data = DB::table('city')->select('Name', 'ID')->where([
            ['id', '>', 1], ['id', '<', 5]
        ])->get();*/

        /*получаем колонку 'Name' первой строки где 'ID' меньше 5
        $data = DB::table('city')->where('ID', '<', 5)->value('Name');*/

        //$data = DB::table('country')->limit(5)->pluck('Name', 'Code');

        /*получаем количество строк
        $data = DB::table('country')->count();*/

        /*получаем максимальное, минимальное, сумму и среднее значение в колонке 'Population'
        $data = DB::table('country')->max('Population');
        $data = DB::table('country')->min('Population');
        $data = DB::table('country')->sum('Population');
        $data = DB::table('country')->avg('Population');*/

        /*отбрасывает одинаковые записи - предотвращает дублирование
        получаем колонку 'CountryCode' без повторений одинаковых значений
        $data = DB::table('city')->select('CountryCode')->distinct()->get();*/

        //обьединяем таблицы 'city' и 'country'  выборкой колонок по признаку 'city.CountryCode' = 'country.Code'
        // ограничиваясь 10 строками по колонке 'city.ID'
        $data = DB::table('city')->select('city.ID', 'city.Name as CityName', 'country.Code', 'country.Name as CountryName')
                ->limit(10)->join('country', 'city.CountryCode', '=', 'country.Code' )
                ->orderBy('city.ID')->get();

        dd($data);
        //return view('home', ['res' => 30, 'name' => 'Andrey']);
    }
}
