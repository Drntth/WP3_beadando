<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\RecipesSeeder;
use Database\Seeders\FavoritesSeeder;
use Database\Seeders\CommentsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $this->call(CategoriesSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(FavoritesSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
