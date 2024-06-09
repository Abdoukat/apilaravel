<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function createCategory(Request $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->user_id = $request->user_id;
        $result = $newCategory->save();
        if ($result) {
            # code...
            return response()->json(['Message' => $newCategory->name.' Created successfully']);
        }
        return response()->json(['Message' => 'There was a problem']);
    }

    public function index()
    {
        $categories = Category::with('products')->get();
        return response()->json($categories);
    }

    public function getProductsByCategory(string $id)
    {
        $category = Category::find($id);
        return response()->json($category->products);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        $deletedCategory = $category->delete();
        return response()->json($deletedCategory);
    }
}
