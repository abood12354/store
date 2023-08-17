<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
//     public function run(): void
//     {


// Admin::factory()->count(3)->create();
// $admins = Admin::all();

// foreach ($admins as $admin) {
//     User::whereNull('userable_id')->first()?->update([
//         'userable_id' => $admin->id,
//         'userable_type' => $admin::class
        
//     ]);
// }

//     }
public function run()
{
    $admin = new Admin([
        'type' => 'superadmin',
        'status' => 1
     ]);
  $user = User::create([
     'username' => 'Foxasdf',
     'firstName' => 'Mohammed',
     'lastName' => 'Algald',
     'email' => 'foxasdf8@gmail.com',
     'gendor'=>'male',
     'password' => bcrypt('password'),
     'birthDate' => '2000-03-09',
     'userable_type' => 'Admin', 
     'userable_id' => $admin->id,
  ]);



  $admin->user()->associate($user);

  $admin->save();

}

}
