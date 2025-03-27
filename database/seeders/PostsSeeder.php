<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            [
                'title'=>'Áo khoác nam ',
                'content'=>'Áo khoác nam mới nhất 2025',
                'image'=>'abc',
                'author_id'=>1,
                'created_at'=>now(),
            ],
            [
                'title'=>'Áo khoác nam ',
                'content'=>'Áo khoác nam mới nhất 2025',
                'image'=>'abc',
                'author_id'=>2,
                'created_at'=>now(),
            ],
        ]);
    }
}
