<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index() 
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->simplePaginate(9);

        return view('home')->with(compact('recipes'));
    }
}
