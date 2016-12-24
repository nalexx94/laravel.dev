<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = array('prod_id','qty','price','hidden','slug');

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute','item_attr','attr_id','item_id');
    }

    public function product()
    {
        return $this->hasOne('App\Product','item_attr','attr_id','item_id');
    }
}
