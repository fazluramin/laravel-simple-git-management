<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerList extends Model
{
    protected $table = 'server_list';

    protected $fillable = [
        'name', 'ip', 'username', 'password', 'port',
    ];

    protected $hidden = [
        'password',
    ];

    public function gitProject()
    {
        return $this->hasMany('App\Models\GitProject');
    }
}
