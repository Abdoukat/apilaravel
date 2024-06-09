<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function createProduct(Request $request)
    {
        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->qte = $request->qte;
        $newProduct->category_id = $request->category_id;
        $result = $newProduct->save();
        if ($result) {
            # code...
            return response()->json(['Message' => $newProduct->name.' Created successfully']);
        }
        return response()->json(['Message' => 'There was a problem']);
    }

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $deletedProduct = $product->delete();
        return response()->json($deletedProduct);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
}
