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
     'userable_type' => $admin::class, 
     'userable_id' => $admin->id,
  ]);



  $admin->user()->associate($user);

  $admin->save();
  User::where('email','foxasdf8@gmail.com')
->update([
     'userable_type' => Admin::class,
       'userable_id' => $admin->id
 ]);



//sub admin
$admin2 = new Admin([
   'type' => 'subadmin',
   'status' => 1
]);
$user2 = User::create([
'username' => 'wolf',
'firstName' => 'ahmad',
'lastName' => 'alkaboni',
'email' => 'wolf8@gmail.com',
'gendor'=>'male',
'password' => bcrypt('password'),
'birthDate' => '2001-04-19',
'userable_type' => $admin::class, 
'userable_id' => $admin->id,
]);
$admin2->user()->associate($user2);

$admin2->save();
User::where('email','wolf8@gmail.com')
->update([
     'userable_type' => Admin::class,
       'userable_id' => $admin2->id
 ]);





$admin3 = new Admin([
   'type' => 'subadmin',
   'status' => 1
]);
$user3 = User::create([
   'username' => 'sarah13',
   'firstName' => 'sarah',
   'lastName' => 'khlood',
   'email' => 'sarah13@gmail.com',
   'gendor'=>'female',
   'password' => bcrypt('password'),
   'birthDate' => '1998-11-10',
   'userable_type' => $admin::class, 
   'userable_id' => $admin->id,
   ]);
   $admin3->user()->associate($user3);
   
   $admin3->save();
User::where('email','sarah13@gmail.com')
->update([
     'userable_type' => Admin::class,
       'userable_id' => $admin3->id
 ]);



}

}
