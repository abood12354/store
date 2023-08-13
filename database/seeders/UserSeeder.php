<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    

//         $admin = Admin::factory()->count('2')->create();
//         $admin->User::userable()->create([
//             'userable_id' => $admin->id,
//             'userable_type' => get_class($admin),
//         ]);

// $vendor = Vendor::factory()->create();
// $user = User::factory()->count('2')->create([
//     'userable_id' => $vendor->id,
//     'userable_type' => get_class($vendor),
// ]);

// $client = Client::factory()->create();
// $user = User::factory()->count('2')->create([
//     'userable_id' => $client->id,
//     'userable_type' => get_class($client),
// ]);


// $admin = User::factory()->count('2')->create([
//     'userable_id' => Admin::factory()->create(['user_id'=>User::factory()->create()->id])->id,
//     'userable_type' => 'App\Admin',
// ]);


// inRandomOrder()->first()?->id
// $client = User::factory()->count(2)->create([
//     'userable_id' => Client::factory()->create([
//        'user_id' => User::inRandomOrder()->first()?->id,
//     ]),
//     'userable_type' => 'App\Client',
// ]);

// $user = User::factory()->create();
// $client = Client::factory()->create([
//     'user_id' => $user->id,
//     'user_type' => get_class($user),
// ]);


// $vendor = User::factory()->count('2')->create([
//     'userable_id' => Vendor::factory()->create(['user_id'=>User::factory()->create()->id])->id,
//     'userable_type' => 'App\Vendor',
// ]);

// $user = User::factory()->create();

// $client = Client::factory()->create([
//   'user_id' => $user->id,
// ]);

// $user->userable()->save($client);




    // User::factory()->count(7)->create([
    //     'userable_id' => Vendor::take(90)->get()->id,
    //     'userable_type' => Vendor::class ,
    // ]);


    User::factory()->count(100)->create();





    }
}
