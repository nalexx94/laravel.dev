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
        return (new Product())->get();
    }

    public function addProduct($data)
    {

    }
}