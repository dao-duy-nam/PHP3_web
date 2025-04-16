<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('banners')->insert([
            ['title' => 'Banner 1', 'image' => 'banner1.jpg', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Banner 2', 'image' => 'banner2.jpg', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
