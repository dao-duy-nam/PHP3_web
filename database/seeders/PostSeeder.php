<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            ['title' => 'Post 1', 'content' => 'Content for post 1', 'image' => 'post1.jpg', 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Post 2', 'content' => 'Content for post 2', 'image' => 'post2.jpg', 'user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
