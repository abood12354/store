<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        Order::factory()->count(10)->create([]);


        Order::factory()->hasAttached(Product::factory()
        ->count(4),[],'products')
        ->count(20)->create();
    }
}
