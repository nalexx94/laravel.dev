<?php

namespace App\Services\Admin;

use App\Product;
use App\Brand;
use App\BrandModel;
use App\Category;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ProductService {

    private $error = [];

    public function __construct()
    {
    }

    public function getAllProducts()
    {
        return Product::with('category','brand','model','images')->get();
    }



    public function addProduct(Request $data)
    {



        $brand = $category = $product = $brandModel = false;

        if ($data->has('brand_id')) {
            $brand = (new Brand())->find($data['brand_id']);
        }
        else if ($data->has('new-brand')){
            $brand = new Brand();
            $postBrand = ['name' => $data['newBrand']];
            $validator = Validator::make($postBrand, $brand->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $brand = $brand::create($postBrand);
            }
        } else {
            $this->error[] = 'Brand not found';
        }

        if ($brand) {
            if ($data->has('new-model')) {
                $brandModel = new BrandModel();
                $postBrandModel = [
                    'brand_id' => $brand->id,
                    'name' => $data['new-model'],
                ];
                $validator = Validator::make($postBrandModel, $brandModel->rules);
                if ($validator->fails()) {
                    $this->error = array_merge($this->error, $validator->errors()->all());
                } else {
                    $brandModel = $brandModel->create($postBrandModel);
                    $brand->brandmodel()->save($brandModel);
                }
            } else if ($data->has('model_id')) {
                $brandModel = (new BrandModel())->find($data['model_id']);
            }

            else {
                $errors[] = 'Brand Model not filled';
            }
        } else {
            $errors[] = 'Brand not found';
        }

        if ($data->has('category_id')) {
            $category = (new Category())->find($data['category_id']);
        }
         else {
            $this->error[] = 'Category not found';
        }

        if (empty($this->error)) {
            $product = new Product();
            $postProduct = [
                'brand_id' => $brand->id,
                'model_id' => $brandModel->id,
                'cat_id' => $category->id,
            ];
            $validator = Validator::make($postProduct, $product->rules);
            if ($validator->fails()) {
                $this->error = array_merge($this->error, $validator->errors()->all());
            } else {
                $product = $product::create($postProduct);

                if ($data->hasFile('images')) {
                    $file = $data->file('images');
                    list($width,$height) = @getimagesize($file->path());
                    $postImage = [
                        'ext' => $file->getClientOriginalExtension(),
                        'size' => $file->getClientSize(),
                        'width' => $width,
                        'height' => $height
                    ];
                    $image = new Image();
                    $validator = Validator::make($postImage, $image->rules);
                    if ($validator->fails()) {
                        $this->error = array_merge($this->error, $validator->errors()->all());
                    }
                    else {
                        $newImage = Image::create($postImage);
                        $imageName = $newImage->id.'.'.$newImage->ext;
                        $newImage->name = $imageName;
                        $newImage->save();
                        $file->move(env('ROOT_IMAGE'),$imageName);
                        $product->images()->save($newImage);
                    }


                }
                flash('Продукт добавлен','success');
            }
        } else {
            dd($this->error);
        }





    }
}