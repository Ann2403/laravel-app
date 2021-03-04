<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        // return true/false
        //$query = DB::insert("INSERT INTO posts (title, description) VALUES (?, ?)", ['Post 9', 'Description post 9']);
        // return count update
        //DB::update("UPDATE posts SET updated_at = ? WHERE id = 1", [NOW()]);
        //DB::delete("DELETE FROM posts WHERE id = ?", [6]);
        // Прописываем зависимость данных для сохранения целостности БД:
        // делаем так чтобы обновлялось два поля сразу либо не обновлялись оба сразу
        DB::beginTransaction();
        try {
            DB::update("UPDATE posts SET created_at = ? WHERE id = 8", [NOW()]);
            DB::update("UPDATE posts SET updated_at = ? WHERE id = 8", [NOW()]);
            DB::commit();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        $posts = DB::select("SELECT * FROM posts WHERE id > :id", ['id' => 2]);
        return $posts;
    }
}
