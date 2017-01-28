<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;
use App\Image;

class ImageService
{
    private $_cache;

    public function __construct()
    {
        $this->_cache = Cache::store('file');
    }

    public function ping() {
        return 'Pong';
    }

    public function getAnyImage(){
        $image = Image::all()->random(1);
        $root = env('ROOT_IMAGE');

        $image = "{$root}{$image->location}{$image->id}.{$image->ext}";
        $imageFile = asset($image);

        echo "<img src=\"".$imageFile."\" alt=\"zara\" />";

    }


}