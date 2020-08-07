<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = [
        'name_en', 'name_ru', 'name_hy','news_id',
    ];

    public function News()
    {
        return $this->belongsTo(News::class);
    }
}
