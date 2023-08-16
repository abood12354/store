<?php

namespace App\Services;

use App\Models\Product;

class Product_Card_1
{
    public function get_all_product()
    {
        $products = Product::take(6)->get();
        return $products;
    }
}
