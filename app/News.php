<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'category_id', 'title_ru', 'title_en', 'title_hy', 'short_description_en',
        'short_description_ru', 'short_description_hy', 'long_description_en', 'long_description_ru',
        'long_description_hy', 'avatar',
    ];
//    protected  $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->hasMany(Images::class);
    }

    public function view_news()
    {
        return $this->hasMany(View_news::class);
    }

}
