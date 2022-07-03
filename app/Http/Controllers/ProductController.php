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

        // dd($product->image);
        return view('product/productShow', [
            'product' => $product,
        ]);
    }

    //show create product form
    public function create(){
        return view('product.productCreate');
    }

    //store a product
    public function store(Request $request){

        $file = $request->image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $file->move('storage/images/', $filename);
        $img = "storage/images/" . $filename;

        // dd($request->FILE('image'));
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $img;
        $product->save();
        return redirect('/');
    }

    //delete a product
    public function destroy(Product $product){

        // dd($product);
        $product->delete();
        return redirect('/');
    }
}
