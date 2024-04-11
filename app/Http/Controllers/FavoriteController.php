<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view favorites.');
        }

        $favorites = $user->favorites()->get();

        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'recipe_id' => 'required|exists:recipes,id'
        ]);

        Favorite::create($request->all());

        return redirect()->route('favorites.index')->with('success', 'Favorite added successfully.');
    }

    public function destroy(Favorite $favorite)
    {
        $favorite->delete();

        return redirect()->route('favorites.index')->with('success', 'Favorite removed successfully.');
    }
}
