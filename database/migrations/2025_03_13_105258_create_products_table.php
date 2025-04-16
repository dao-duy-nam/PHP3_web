<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // mặc định trong 1 file migration bắt buộc phải có đủ hàm UP và DOWN
    // hàm UP dùng để cập nhật csdl 
    // hàm DOWN là những công việc ngươc lại so với hàm up
    /**
     * Run the migrations.
     */
    
    public function up(): void
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ma_san_pham',20)->unique();// quy định độ dài và không đc phép mã sản phẩm  trùng nhau
            $table->string('ten_san_pham');
            $table->decimal('gia',10,2);
            $table->decimal('gia_khuyen_mai',10,2)->nullable();// cho phep gia tri la null
            $table->unsignedInteger('so_luong'); // so nguyen duong
            $table->date('ngay_nhap');
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(true); //set gia tri mac dinh

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
