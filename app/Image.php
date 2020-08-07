<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image_path','news_id',
    ];

    public function News()
    {
        return $this->belongsTo(News::class);
    }
}
