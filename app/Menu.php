<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = array('location','name','hidden');

    public function menuItems()
    {
        return $this->hasMany('App\MenuItems');
    }
}
