<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Comment;
use Auth;
use Nette\Utils\Image;


class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(9);

        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('recipes.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $recipe = Auth::user()->recipes()->create($validatedData);

        // return view('recipes.show', compact('recipe'));
        return redirect()->route('recipes.edit', $recipe)->with('success', __('Recipe successfully created!'));
    }

    public function show(Recipe $recipe)
    {
        if (! $recipe) {
            return view('recipes.not-found', [
                'message' => 'No recipe found with that ID.',
                'createNewUrl' => Auth::check() ? route('recipes.create') : route('auth.register'),
                'createNewText' => Auth::check() ? 'Publish a new recipe' : 'Register to create a recipe'
            ]);
        }

        return view('recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        if (auth()->user()->id !== $recipe->author_id) {
            abort(403, 'Unauthorized action!');
        }
        $categories = Category::orderBy('name')->get();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update($request->except('_token'));

        return redirect()->route('recipes.edit', $recipe)->with('success', __('Post saved successfully'));
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }

    public function comment(Request $request, Recipe $recipe)
    {
        $request->validate([
            'comment' => 'required|min:5',
        ]);

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;

        $recipe->comments()->save($comment);

        return back()
            ->with('success', __('Comment created successfully'));
    }

    public function uploadImage(Request $request, Recipe $recipe)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $fileID = uniqid();
        $filename = "posts/{$fileID}.{$image->extension()}";

        $image = Image::make($image)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path("/uploads/{$filename}"));

        $recipe->image = $filename;
        $recipe->save();

        return response()->json(['image' => $recipe->image ]);
    }
}
