<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en', 'name_ru', 'name_hy',
    ];


    public function news()
    {
        return $this->hasMany(News::class);
    }

}
