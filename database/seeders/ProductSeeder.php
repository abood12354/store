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




$product1->addMedia(storage_path('app/product-1/product-9.jpg'))->toMediaCollection();






    $product1=Product::create([
      'status'=>"Old",
      'name'=>"x1",
      'price'=>2000,
      'quantity'=>5,
   //   'Assess'=>4,
      'sell'=>60,
  ]);


$product1->addMedia(storage_path('app/product-1/product-8.jpg'))->toMediaCollection();


$product1=Product::create([
    'status'=>"Old",
    'name'=>"x3",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-2.jpg'))->toMediaCollection();


$product1=Product::create([
    'status'=>"New",
    'name'=>"x3",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-3.jpg'))->toMediaCollection();

$product1=Product::create([
    'status'=>"New",
    'name'=>"x4",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-4.jpg'))->toMediaCollection();

$product1=Product::create([
    'status'=>"New",
    'name'=>"x4",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-5.jpg'))->toMediaCollection();


$product1=Product::create([
    'status'=>"New",
    'name'=>"x4",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-12.jpg'))->toMediaCollection();





$product1=Product::create([
    'status'=>"New",
    'name'=>"x4",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-7.jpg'))->toMediaCollection();



$product1=Product::create([
    'status'=>"New",
    'name'=>"x4",
    'price'=>2000,
    'quantity'=>5,
 //   'Assess'=>4,
    'sell'=>60,
]);


$product1->addMedia(storage_path('app/product-1/product-11.jpg'))->toMediaCollection();



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




}

    
}
