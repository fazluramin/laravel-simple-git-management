<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    protected $table = 'user_types';

    public $timestamps = false;

    public function users(){
        return $this->hasMany('App\Models\Users');
    }
}
