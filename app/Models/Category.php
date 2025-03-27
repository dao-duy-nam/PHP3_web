<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // để sd đc facories tạo dữ liệu mẫu ta cần phải sd thư viện 
    use HasFactory;
    // quy định model này thao tac với bảng nào
    protected $table = 'categories';
    // các trường trong bảng đều phải đưa vào fillable
    protected $fillable = [
        'ten_danh_muc',
        'trang_thai'
    ];
    // tạo liên hệ với products
    public function products(){
        return $this->hasMany(Products::class,'category_id');
    }
}
