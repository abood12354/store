<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     
     */
    public function run(): void
    {
        //Category::factory()->count(10)->create(),

        // Category::factory()->count(4)->create();
        // Category::factory()->hasAttached(
        // Category::take(rand(2, 10))->inRandomOrder()
        // ->pluck('id')->toArray(),
        // [],
        // 'subcategories')
        // ->count(20)->create();

        Category::factory()->hasAttached(Category::factory()
        ->count(3),[],'subcategories')
        ->count(20)->create();
}
    }
