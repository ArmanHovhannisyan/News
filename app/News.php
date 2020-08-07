<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'category_id', 'title_en', 'title_ru', 'title_hy', 'short_description_en',
        'short_description_ru', 'short_description_hy', 'long_description_en', 'long_description_ru',
        'long_description_hy', 'view', 'avatar',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Image()
    {
        return $this->hasMany(Image::class);
    }

    public function View_news()
    {
        return $this->hasMany(View_news::class);
    }

    public function Hashtag()
    {
        return $this->hasMany(Hashtag::class);
    }
}
