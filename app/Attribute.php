<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = array('key','value');


    public function items()
    {
        return $this->belongsToMany('App\Item','item_attr','attr_id','item_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','prod_attr','attr_id','prod_id');
    }
}
