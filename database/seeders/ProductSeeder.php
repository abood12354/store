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
        $product1=Product::create([
            'status'=>"New",
            'name'=>"Noms Watsh",
            'price'=>1000,
            'quantity'=>2,
         //   'Assess'=>4,
            'sell'=>30,
        ]);

        $imagePath = public_path('assets\images\product-1\product-10.jpg');
        $product1->addMedia($imagePath)
    ->toMediaCollection();


    $products = Product::whereNull('admin_id')->get(); 

    foreach ($products as $product) {
    
        Product::saving(function ($product) {
            if (!$product->admin_id) {
              $product->admin_id = Admin::inRandomOrder()->first()->id;
            }
          });
          
          Product::whereNull('admin_id')->get()->each->save();
    
    }


    $products = Product::whereNull('catagory_id')->get(); 

foreach ($products as $product) {

    Product::saving(function ($product) {
        if (!$product->catagory_id) {
          $product->catagory_id = Category::inRandomOrder()->first()->id;
        }
      });
      
      Product::whereNull('catagory_id')->get()->each->save();

}



// foreach (Product::all() as $product) {
//     // // $url = 'https://picsum.photos/200/300';
//     // $url='/assets/images/product-1/product-2.jpg';
//     // //$path='C:\product-1\product-2.jpg';
//     // // $product->addMediaFromUrl($url)
//     // // ->usingName("awddada")
//     // // ->toMediaCollection();

//     $imagePath = public_path('assets/images/product-1/');
//     $product->addMedia($imagePath)
//     ->toMediaCollection('images');
// }

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
