<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'avatar',
        'fullname',
        'address',
        'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {

        return $this->hasMany(Rating::class);
    }

    public function suggests()
    {

        return $this->hasMany(Suggest::class);
    }

    public function orders()
    {
        
        return $this->hasMany(Order::class);
    }
}
