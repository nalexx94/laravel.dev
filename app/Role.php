<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = array('name');

    public function users()
    {
        return $this->belongsToMany('App\User','role_users','user_id','role_id');
    }
}
