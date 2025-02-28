<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

use Auth;

class CategoryController extends Controller
{ 
    public function index(Request $request)
    {

          return view('category.list');
    }

    public function getCategories(Request $request)
    {
        $categories = CategoryModel::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        $category = new CategoryModel();
        $category->category_name = $request->category_name;
        $category->save();

        return response()->json(['message' => 'Category added successfully!']);
    }
    public function edit($id)
    {
        $category = CategoryModel::find($id);
        return response()->json($category);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);
        $category = CategoryModel::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->save();

        return response()->json(['message' => 'Category updated successfully!']);
    }
    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully.']);
    }
}