<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }

    // public function create()
    // {
    //     return view('categories.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:categories,name',
    //     ]);

    //     Category::create($request->all());

    //     return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    // }

    public function show(Category $category)
    {
        // return view('categories.show', compact('category'));

        $recipes = $category->recipes()->orderBy('created_at', 'desc')->paginate(9);

        return view('categories.show')->with(compact('category', 'recipes'));
    }

    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }

    // public function update(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'name' => 'required|unique:categories,name,' . $category->id,
    //     ]);

    //     $category->update($request->all());

    //     return redirect()->route('categories.show', $category)->with('success', 'Category updated successfully.');
    // }

    // public function destroy(Category $category)
    // {
    //     $category->delete();

    //     return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    // }
}
