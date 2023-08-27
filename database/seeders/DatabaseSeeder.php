<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            VendorSeeder::class,
            AdminSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
            CommentSeeder::class,
            ColorSeeder::class,
            CmsPageTableSeeder::class,
           
        ]);
    }
}
