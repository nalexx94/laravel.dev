<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table = 'brand_models';
    protected $fillable = array('brand_id','name', 'description');

    public $rules = [
        'name' => 'required|max:255',
        'brand_id' => 'integer|exists:brands,id'
    ];

    public function brand()
    {
        return $this->hasOne('App\Brand');
    }

    public function product()
    {
        return $this->hasOne('App\Product','model_id');
    }

}
