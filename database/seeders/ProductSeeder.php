<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(10)->create();

        $products = Product::all();
foreach ($products as $product) {
    Product::whereNull('vendor_id')->first()?->update([
        // 'vendor_id'=>$vendor->id,
        'vendor_id'=>Vendor::inRandomOrder()->first()?->id,
    ]);
}

$products = Product::all();
foreach ($products as $product) {
    Product::whereNull('admin_id')->first()?->update([
        // 'vendor_id'=>$vendor->id,
        'admin_id'=>Admin::inRandomOrder()->first()?->id,
    ]);
}

$products = Product::all();
foreach ($products as $product) {
    Product::whereNull('subcategories_id')->first()?->update([
        // 'vendor_id'=>$vendor->id,
        'subcategories_id'=>Subcategory::inRandomOrder()->first()?->id,
    ]);
}

// $products = Product::all();
// foreach ($products as $product) {
//     $product->hasAttached(Color::factory()
//   ->count(20)->create(),[],'colors')
//   ->count(90)->create();
// }

Product::factory()->hasAttached(Color::factory()
->count(3),[],'colors')
->count(20)->create();
}

    
}
