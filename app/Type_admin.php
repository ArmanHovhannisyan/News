<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_admin extends Model
{
    protected $fillable = [
        'name_en', 'name_ru', 'name_hy',
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
