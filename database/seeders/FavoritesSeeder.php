<?php

namespace Database\Seeders;

use App\Models\Favorite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;
use Faker\Factory as Faker;

class FavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::pluck('id')->toArray();
        $recipes = Recipe::pluck('id')->toArray();

        foreach ($users as $userId) {
            $favoriteCount = $faker->numberBetween(1, 5); 
            $favoriteRecipes = $faker->randomElements($recipes, $favoriteCount);

            foreach ($favoriteRecipes as $recipeId) {
                Favorite::create([
                    'user_id' => $userId,
                    'recipe_id' => $recipeId,
                ]);
            }
        }
    }
}
