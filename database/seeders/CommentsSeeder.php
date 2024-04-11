<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\User;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::pluck('id')->toArray();
        $recipes = Recipe::pluck('id')->toArray();

        foreach ($recipes as $recipeId) {
            $commentCount = $faker->numberBetween(1, 5); 
            $commentUsers = $faker->randomElements($users, $commentCount);

            foreach ($commentUsers as $userId) {
                Comment::create([
                    'user_id' => $userId,
                    'recipe_id' => $recipeId,
                    'message' => $faker->sentence,
                ]);
            }
        }
    }
}
