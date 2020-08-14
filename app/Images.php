<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Images extends Model
{
    protected $fillable = [
        'image_path', 'news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }




}
