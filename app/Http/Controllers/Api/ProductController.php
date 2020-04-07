<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::get();
        return ['status' => 200, 'data' => $products];
    }
}
