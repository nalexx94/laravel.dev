<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = array('parent_id','name','slug','description');

    public $rules = [
        'name' => 'required|unique:categories|max:255',
        'parent_id' => 'integer|exists:categories,id'
    ];

    public function products()
    {
        return $this->hasMany('App\Product','cat_id');
    }
}
