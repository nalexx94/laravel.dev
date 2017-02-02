<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = array('name','description');

    public $rules = [
        'name' => 'required|unique:brands|max:255',
    ];

    public function brandmodel()
    {
        return $this->hasMany('App\BrandModel');
    }

    public function product(){
        return $this->hasOne('App\Product','brand_id');
    }
}
