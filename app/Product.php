<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = array('brand_id','model_id', 'cat_id','description', 'slug', 'hidden');


    public function attributes()
    {
        return $this->belongsToMany('App\Attribute','prod_attr','attr_id','prod_id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image','image_products','image_id','prod_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function model()
    {
        return $this->belongsTo('App\BrandModel');
    }

}
