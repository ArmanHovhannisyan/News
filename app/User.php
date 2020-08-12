<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status_id', 'type_admin_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function type_admin()
    {
        return $this->belongsTo(Type_admin::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function isAdmin()
    {
        return $this->status_id == 2;
    }

    public function waiting()
    {
        return $this->status_id == 1;
    }

    public function block()
    {
        return $this->status_id == 3;
    }

    public function remove()
    {
        return $this->status == 'remove';
    }
}
