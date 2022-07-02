<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //To show all products
    public function index(){
        $products = \App\Models\Product::all();
        return view('welcome', [
            'product' => $products,
        ]);
    }

    //To show a product
    public function show(Product $product){
        return view('product/productShow', [
            'product' => $product,
        ]);
    }
}
