<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->get('search');

        $recipes = Recipe::with('category')->orderBy('created_at', 'desc');

        if ($searchTerm) {
            $recipes->where('title', 'like', "%{$searchTerm}%")
                ->orWhere('description', 'like', "%{$searchTerm}%");
        }

        $recipes = $recipes->paginate(9);

        if ($recipes->isEmpty()) {
            $message = "No recipes found for '{$searchTerm}'";
            $createNewUrl = Auth::check() ? route('recipes.create') : route('register');
            $createNewText = Auth::check() ? 'Create a new recipe' : 'Register to create a recipe';
            return view('search', compact('message', 'createNewUrl', 'createNewText'));
        }

        return view('search', compact('recipes', 'searchTerm'));
    }
}
