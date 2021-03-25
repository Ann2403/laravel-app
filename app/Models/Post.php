<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, Notifiable;

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

    //перехват данных перед внесем в БД (аналог сетера)
    public function setTitleAttribute($value) {
        //приводим полученое значение к стилю titlе (каждое слово с большой буквы)
        //и заносим его в колонку(attributes) title
        $this->attributes['title'] = Str::title($value);
    }

    //перехват данных перед выводом с БД (аналог гетера)
    public function getTitleAttribute($value) {
        //приводим значение с БД в верхний регистр
        return Str::upper($value);
    }
}
