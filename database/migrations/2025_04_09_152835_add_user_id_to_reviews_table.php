<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('reviews', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('id'); // Thêm nullable để tránh lỗi
    });

    

    // Thêm khóa ngoại sau khi dữ liệu đã hợp lệ
    Schema::table('reviews', function (Blueprint $table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


};
