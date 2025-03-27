<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Nơi để thêm dữ liệu
        // DB::table('products')->insert([
        //     [
        //         'ma_san_pham'=>'SP001',
        //         'ten_san_pham'=>'Áo khoác nam',
        //         'category_id'=>1,
        //         'gia'=>150000,
        //         'gia_khuyen_mai'=>12000,
        //         'so_luong'=>50,
        //         'ngay_nhap'=>'2024-03-15',
        //         'mo_ta'=>'áo ám',
        //         'trang_thai'=>true,
        //         'created_at'=>now(),
        //     ],
        //     [
        //         'ma_san_pham'=>'SP002',
        //         'ten_san_pham'=>'Áo khoác nữ',
        //         'category_id'=>2,
        //         'gia'=>130000,
        //         'gia_khuyen_mai'=>12000,
        //         'so_luong'=>50,
        //         'ngay_nhap'=>'2024-03-15',
        //         'mo_ta'=>'áo ám',
        //         'trang_thai'=>true,
        //         'created_at'=>now(),
        //     ],
        // ]);
        Category::factory()->count(5)->create()->each(function($category){
            Products::factory()->count(10)->create(['category_id'=>$category->id]);
        });
    }
}
