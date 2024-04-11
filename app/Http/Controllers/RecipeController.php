<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::simplePaginate(9);

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('recipes.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'ingredients' => 'required',
        //     'instructions' => 'required',
        //     'author_id' => 'required|exists:users,id',
        //     'category_id' => 'required|exists:categories,id',
        // ]);

        // Recipe::create([
        //     'title' => $validatedData['title'],
        //     'description' => $request->description,
        //     'ingredients' => $validatedData['ingredients'],
        //     'instructions' => $validatedData['instructions'],
        //     'image' => $request->image,
        //     'author_id' => $validatedData['author_id'],
        //     'category_id' => $validatedData['category_id'],
        // ]);
        // return redirect()->route('home')->with('success', 'Recipe created successfully.');
        // return view('home')->with('success', 'Recipe created successfully.');
        $recipe = Auth::user()->recipes()->create($request->all());

        return view('recipes.show', compact('recipe'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        if (auth()->user()->id !== $recipe->author_id) {
            abort(403, 'Unauthorized action!');
        }
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'author_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $recipe->update([
            'title' => $validatedData['title'],
            'description' => $request->description,
            'ingredients' => $validatedData['ingredients'],
            'instructions' => $validatedData['instructions'],
            'image' => $request->image,
            'author_id' => $validatedData['author_id'],
            'category_id' => $validatedData['category_id'],
        ]);

        return redirect()->route('recipes.show', $recipe)->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }
}
