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
            'Assess'=>4,
            'sell'=>30,
        ]);

         $imagePath = public_path('assets/images/product-1/product-1.jpg');
        
    //     $product1->addMedia($imagePath)
    // ->toMediaCollection();
    // dd($product1);

    $product1->addMedia(storage_path('app/product-1/product-1.jpg'))->toMediaCollection();





    
//     $path = 'assets/images/product-1/product-1.jpg';
      
//     //   if (Storage::disk('public')->exists($path)) {
  
//         $contents = File::get(public_path($path));
//         $p1=public_path($path);
  
//         $product1->addMediaFromDisk('public')
//                ->toMediaCollection('images', $p1);
  
//     // //   } else {
//     //     Log::error("Product image not found at path: {$path}");
//     //   }
  


//     // $imageFile = public_path('assets/images/product-1/product-2.jpg');

//     // $contents = File::get($imageFile);
  
//     // $product1->addMediaFromDisk('public')  
//     //        ->toMediaCollection('images', $contents);

//     // $product1->addMediaFromDisk('public', '/full/path/to/public/images/product-1.jpg')
//     // ->toMediaCollection('images', 'product-1.jpg');

//     // $imagePath = public_path('assets/images/product-1/product-1.jpg');
//     //    $imagePath = storage_path('app/public/2/300.jpeg');
//     //    $imagePath = storage_path('app/public/2/300.jpeg');

//     //    dd($imagePath);
//     // $product1->addMedia($imagePath)
// //     $product1->addMediaFromDisk()
// // ->toMediaCollection();












        $products = Product::all();
foreach ($products as $product) {
    Product::whereNull('vendor_id')->first()->update([
        // 'vendor_id'=>$vendor->id,
        'vendor_id'=>Vendor::inRandomOrder()->first()->id,
    ]);
}

$products = Product::all();
foreach ($products as $product) {
    Product::whereNull('admin_id')->first()->update([
        // 'vendor_id'=>$vendor->id,
        'admin_id'=>Admin::inRandomOrder()->first()->id,
    ]);
}

$products = Product::all();
foreach ($products as $product) {
    Product::whereNull('subcategories_id')->first()?->update([
        // 'vendor_id'=>$vendor->id,
        'subcategories_id'=>Subcategory::inRandomOrder()->first()?->id,
    ]);
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
