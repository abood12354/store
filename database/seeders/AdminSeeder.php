<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ->count('1')
//         $admin = User::factory()->create();
// $admin->userable()->associate(Admin::factory())->create();
// $admin->save(); 

// $admin = Admin::factory()->create();
// // ->associate(User::factory())
// $admin->userable()->create([
//     'userable_id' => $admin->id,
//     'userable_type' => get_class($admin),
// ]);

// $admin = Admin::factory()->count('2')->create();
// $admin->User::userable()->create([
//     'userable_id' => $admin->id,
//     'userable_type' => get_class($admin),
// ]);

Admin::factory()->count(3)->create();
$admins = Admin::all();

foreach ($admins as $admin) {
    User::whereNull('userable_id')->first()?->update([
        'userable_id' => $admin->id,
        'userable_type' => $admin::class
    ]);
}

    }
}
