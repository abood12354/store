<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $vendor = User::factory()->create();
    //     $vendor->userable()->associate(Vendor::factory())->create([
    //         'userable_id' => $vendor->id,
    // 'userable_type' => get_class($vendor),
    //     ]);
    //     $vendor->save(); 

//         $vendor = Vendor::factory()->create();
//         // ->associate(User::factory())
// $vendor->userable()->create([
//     'userable_id' => $vendor->id,
//     'userable_type' => get_class($vendor),
// ]);

// $vendor = Vendor::factory()->count('2')->create();
// $vendor ->User::userable()->create([
//     'userable_id' => $vendor->id,
//     'userable_type' => get_class($vendor),
// ]);

Vendor::factory()->count(7)->create();
$vendors = Vendor::all();

foreach ($vendors as $vendor) {
    User::whereNull('userable_id')->first()?->update([
        'userable_id' => $vendor->id,
        'userable_type' => $vendor::class
    ]);
}



    }
}
