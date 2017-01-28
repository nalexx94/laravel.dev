<?php

namespace App\Http\Controllers;
use App\Services\ImageService;
use App\Image;

use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function index()
   {
      // $img = (new ImageService())->getAnyImage();
       return view('shop.index');
   }

    public function about() {
        $title = 'About';
        return view('shop.about')->with([
            'title' => $title
        ]);
    }

    public function add(){
        return view('shop.add-image');
    }

    public function postAdd (Request $request){

        $file = $request->file()['image'];

        // todo validaton
        $data = [
            'ext' => $file->getClientOriginalExtension(),
            'name' => $file->getClientOriginalName(),

        ];
        $newImage = Image::create($data);
        $file->move(env('ROOT_IMAGE'),$newImage->id.'.'.$newImage->ext);
        dd($file);

    }
}
