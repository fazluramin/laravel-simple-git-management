<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Users extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'user_invited_token',
    ];

    public function userType()
    {
        return $this->belongsTo('App\Models\UserTypes');
    }

    public function gitProjectHasUsers()
    {
        return $this->hasMany('App\Models\GitProjectHasUsers');
    }
}
