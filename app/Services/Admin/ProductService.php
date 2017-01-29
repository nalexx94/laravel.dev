<?php

namespace App\Services\Admin;

use App\Product;
use Illuminate\Support\Facades\DB;


class ProductService {

    public function __construct()
    {
    }

    public function getAllProducts()
    {
        return Product::with('category','brand','model','images')->get();
    }

    public function addProduct($data)
    {

    }
}