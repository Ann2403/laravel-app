<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //указываем сто поле "content" будет заполняться по умолчанию
    protected $attributes = [
        'content' => 'Lorem ipsum...'
    ];

    //вносим колонку 'title' в белый список для массовго заполнения таблицы
    //в $guarded указывается черный список
    //чтобы сделать все колонки масово заполняемыми: $guarded = []
    protected $fillable = ['title', 'content', 'rubric_id'];

    //создаем виртуальное свойство для таблицы posts для получения связаной рубрики
    public function rubric() {
        //прописываем связь с таблицей rubrics
        return $this->belongsTo(Rubric::class);
    }

    //СВЯЗЬ МНОГИЕ К МНОГИМ
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
