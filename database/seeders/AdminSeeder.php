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
