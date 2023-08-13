<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Comment::factory()->count(40)->create();

        $comments = Comment::all();
        foreach ($comments as $comment) {
            Comment::whereNull('user_id')->first()?->update([
                'user_id' =>User::inRandomOrder()->first()?->id,
            ]);
        }

        $comments = Comment::all();
        foreach ($comments as $comment) {
            Comment::whereNull('replay_id')->first()?->update([
                'replay_id' =>Comment::inRandomOrder()->first()?->id,
            ]);
        }

    }
}
