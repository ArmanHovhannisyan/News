<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View_news extends Model
{
    protected $fillable = [
        'news_id','ip',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
