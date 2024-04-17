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

    public function show(Category $category)
    {
        $recipes = $category->recipes()->orderBy('created_at', 'desc')->paginate(9);

        return view('categories.show')->with(compact('category', 'recipes'));
    }
}
