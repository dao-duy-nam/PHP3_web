<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           //
           DB::table('banners')->insert([
            [
                'title'=>'áo nam',
                'image'=>'abc',
                'created_at'=>now(),
            ],
            [
                'title'=>'áo nữ',
                'image'=>'abc',
                'created_at'=>now(),
            ],
        ]);
    }
}
