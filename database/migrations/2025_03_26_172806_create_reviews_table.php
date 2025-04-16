<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Mã định danh duy nhất
            $table->foreignId('customer_id')->constrained()->onDelete('cascade'); // Khóa ngoại tham chiếu bảng customers
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Khóa ngoại tham chiếu bảng products
            $table->text('review'); // Nội dung đánh giá
            $table->integer('rating'); // Điểm đánh giá (1-5)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
