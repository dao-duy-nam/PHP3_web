<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // mặc định trong 1 file migrations bắt buộc phải có đủ hàm Up và hàm DOWN
    // hàm Up dùng để cập nhật cơ sở dữ liệu
    // hàm down là những công việc ngược lại so với hàm UP
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ma_san_pham',20)->unique();// quy định độ dài và ko đc phép mã sp trùng nhau
            $table->string('ten_san_pham');
            $table->decimal('gia',10,2);
            $table->decimal('gia_khuyen_mai',10,2)->nullable();//nullable cho phép chứa gtri null
            $table->unsignedInteger('so_luong');//số nguyên dương
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(true);// sét gias trị defal mặc định
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
