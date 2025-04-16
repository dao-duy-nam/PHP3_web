<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            ['customer_id' => 1, 'product_id' => 1, 'review' => 'Great service!', 'rating' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['customer_id' => 2, 'product_id' => 2, 'review' => 'Good product.', 'rating' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
