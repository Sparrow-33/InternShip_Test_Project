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

    // show edit  product
    public function edit(Product $product){
        return view('product.productEdit', [
            'product' => $product,
        ]);
    }

    //edit a product
    public function update(Request $request, Product $product){

      $data = $request->only(["name", "description", "price"]);
       if($request->hasFile('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('storage/images/', $filename);
            $img = "storage/images/" . $filename;
            $product->image = $img;

            $data['image'] = $img;
        }

        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->save();
        $product->update($data);
        return redirect('/');
    }

    //delete a product
    public function destroy(Product $product){

        // dd($product);
        $product->delete();
        return redirect('/');
    }
}
