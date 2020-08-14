<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = [
        'name','news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }




}
