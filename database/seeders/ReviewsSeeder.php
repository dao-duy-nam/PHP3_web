<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reviews')->insert([
            [
                'rating'=>1,
                'danh_gia'=>'Áo khoác nam',
                'customer_id'=>1,
                'created_at'=>now(),
            ],
            [
                'rating'=>2,
                'danh_gia'=>'Áo khoác nam',
                'customer_id'=>2,
                'created_at'=>now(),
            ],
        ]);
    }
}
