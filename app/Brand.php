<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = array('name','description');

    public function brandmodel()
    {
        return $this->hasMany('App\BrandModel');
    }

    public function product(){
        return $this->hasOne('App\Product','brand_id');
    }
}
