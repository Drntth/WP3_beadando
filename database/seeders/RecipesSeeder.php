<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\User;
use Faker\Factory as Faker;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = Category::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Recipe::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'ingredients' => $faker->text,
                'instructions' => $faker->paragraph,
                'image' => $faker->imageUrl(),
                'author_id' => $faker->randomElement($users),
                'category_id' => $faker->randomElement($categories),
            ]);
        }
    }
}
