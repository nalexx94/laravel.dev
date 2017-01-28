<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItems extends Model
{
    protected $table = 'menu_items';
    protected $fillable = array('menu_id','name','slug','hidden','order');

    public function menu()
    {
        return $this->belongsTo('App\Menu','menu_id');
    }
}
