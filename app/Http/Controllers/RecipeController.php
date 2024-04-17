<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use Auth;
use Illuminate\Support\Str;

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
            'description'=> 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $recipe = Auth::user()->recipes()->create($validatedData);

        if ($request->hasFile('image')) {
            try {
                $this->uploadImage($request, $recipe);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }

        return redirect()->route('recipes.edit', $recipe)->with('success', __('Recipe successfully created!'));
    }

    private function uploadImage(Request $request, Recipe $recipe)
    {
        $image = $request->file('image');

        $username = Str::slug(Auth::user()->name);
        $filename = $username . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        try {
            $path = $image->storeAs('public/img/uploads', $filename);

            $path = str_replace('public/', 'storage/', $path);

            $recipe->image = $path;
            $recipe->save();
        } catch (\Exception $e) {
            throw new \Exception('Image upload failed. Please try again later.');
        }
    }

    public function show(Recipe $recipe)
    {
        if (!$recipe) {
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
        // TODO: Laravel policy: php artisan make:policy
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
        if (auth()->user()->id !== $recipe->author_id) {
            abort(403, 'Unauthorized action!');
        }

        $recipe->delete();
        
        return redirect()->route('recipes.index')->with('success', 'Recipe successfully deleted.');
    }

    public function comment(Request $request, Recipe $recipe)
    {
        $request->validate([
            'comment' => 'required|min:3',
        ]);

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;

        $recipe->comments()->save($comment);

        return back()->with('success', __('Comment successfully created.'));
    }

    public function favorite(Request $request, Recipe $recipe)
    {
        $request->validate([
            'user_id' => 'required',
            'recipe_id' => 'required',
        ]);
    
        $favorite = new Favorite;

        $favorite->user_id = $request->user_id;
        $favorite->recipe_id = $recipe->id;

        $favorite->save();

        return back()->with('success', __('Recipe successfully added to favorites.'));
    }
}
