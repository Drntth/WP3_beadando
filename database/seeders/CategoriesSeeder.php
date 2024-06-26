<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodCategories = [
            'Soups',
            'Salads',
            'Main Dishes',
            'Side Dishes',
            'Desserts',
            'Snacks',
        ];

        foreach ($foodCategories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }
    }
}
