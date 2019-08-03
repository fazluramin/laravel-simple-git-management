<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GitProject extends Model
{
    protected $table = 'git_project';

    public function gitProjectHasUsers()
    {
        return $this->hasMany('App\Models\GitProjectHasUsers');
    }

    public function serverList()
    {
        return $this->belongsTo('App\Models\ServerList');
    }

}
