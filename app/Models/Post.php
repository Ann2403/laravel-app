<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*подсказываем как у нас называется таблица
    protected $table = 'posts';
    (по умолчанию ищется таблица по имени модели только в нижнем регистре и множественном числе)

    говорим как у нас называется первичный ключ
    protected $primaryKey = 'posts_id';
    что он у нас не автоинкрементирован
    public $incrementing = false;
    и что не число, а строка
    public  $keyType = 'string';
    (по умолчани это поле должно быть числовым, автоинкрементированным и называться id)
    говорим чтобы поля "created_at" и "updated_at" автоматически не заполнялись
    public $timestamps = false;*/

    //указываем сто поле "content" будет заполняться по умолчанию
    protected $attributes = [
        'content' => 'Lorem ipsum...'
    ];

    //вносим колонку 'title' в белый список для массовго заполнения таблицы
    //в $guarded указывается черный список
    //чтобы сделать все колонки масово заполняемыми: $guarded = []
    protected $fillable = ['title', 'content'];
}
