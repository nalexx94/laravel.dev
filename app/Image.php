<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'name',
        'width',
        'height',
        'size',
        'location',
        'hidden',
        'ext'
    ];

    public $rules = [
        'ext' => 'in:jpg,png,gif',
        'size' => 'integer|max:2048000',
        'width' => 'integer|max:4000',
        'height' => 'integer|max:4000'
    ];

    public $rules_name = [
        'name' => 'unique:images,name'
    ];


    public function products()
    {
        return $this->belongsTo('App\Product','image_products','image_id','prod_id');
    }

}
