<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    //СВЯЗЬ ОДИН К ОДНОМУ
    /*
    //создаем виртуальное свойство для таблицы rubrics для получение связаного поста
    //с таблицы posts
    public function post() {
        //прописываем связь с таблицей posts
        return $this->hasOne(Post::class);
    }*/

    //СВЯЗЬ ОДИН К МНОГИМ
    public function posts() {
        return $this->hasMany(Post::class);
    }

}
