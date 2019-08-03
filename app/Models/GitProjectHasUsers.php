<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GitProjectHasUsers extends Model
{
    protected $table = 'git_project_has_users';
    public $incrementing = true;
    public $timestamps = false;

    public function user() 
    {
        return $this->belongsTo('App\Models\Users');
    }

    public function gitProject() 
    {
        return $this->belongsTo('App\Models\GitProject');
    }

}
