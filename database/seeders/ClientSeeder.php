<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\City;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $client = User::factory()->create();
        // $client->userable()->associate(Client::factory())->create();
        // $client->save(); 

        // $client = client::factory()->create();
        // // ->associate(User::factory())
        // $client->userable()->create([
        //     'userable_id' => $client->id,
        //     'userable_type' => get_class($client),
        // ]);

        // $client = Client::factory()->count('2')->create();
        // $client-> User::userable()->create([
        //     'userable_id' => $client->id,
        //     'userable_type' => get_class($client),
        // ]);

        // Client::take(2)->get()->create([
        //      'user_id' => User::inRandomOrder()->first()?->id,
        // ]);

        // $vendor = User::factory()->count('2')->create([
        //     'userable_id' => Vendor::factory()->create()->id,
        //     'userable_type' => 'App\Vendor',
        // ]);


        //////////////////////////////////////
        // Create a client
        //   $client = Client::factory()->count(2)->create();

        //   // Create a related user 
        //   $user = User::factory()->count(2)->create();

        //   // Associate the user with the client
        //   $client->userable()->associate($user);

        //   $client->save();
        /////////////////////////////////
        // $user = User::first();

        // $client = Client::factory()->create([
        //     'user_id'=>User::factory()
        // ]);  
        //     // client attributes
        // //   $user = User::factory()->count(2)->create();

        //   $client->user()->save($user);

        //   // Link client back to user
        //   $user->userable()->associate($client);

        //   $user->save();

        /////////////////////////////////////////////

        //$client = Client::factory()->create();

        // $user = User::factory()->create([
        //    'userable_id' => $client=Client::factory()->create([
        //     'user_id'=>User::inRandomOrder()->first()?->id,
        //    ]),
        //    'userable_type' => Client::class 
        // ]);

        // $client->user()->associate($user);

        //  $client->save();

        //////////////////////////////

        // ClientSeeder.php


        // $user = User::first();

        // $client = Client::create([
        //   'user_id' => $user->id,
        //   // ...
        // ]);
        //   $client = Client::factory()->create();

        //   $user = User::factory()->create([
        //      'userable_id' => $client->id,
        //      'userable_type' => Client::class 
        //   ]);

        //   $client->user()->associate($user);

        //   $client->save();
        ////////////////////////////////////////


        //   $user = new User;

        //   //$client->user()->save($user); // save user via relationship

        //   $user->userable()->associate($client); // associate client to user

        //   //$user->save(); // save user to attach polymorphic relation

        Client::factory()->count(90)->create();
        $clients = Client::all();

        foreach ($clients as $client) {
            User::whereNull('userable_id')->first()?->update([
                'userable_id' => $client->id,
                'userable_type' => $client::class
            ]);
        }
        $cities = City::all();
        foreach ($cities as $city) {
            Client::whereNull('city_id')->first()?->update([
                'city_id' => $city->id,
            ]);
        }
      

    }
}
