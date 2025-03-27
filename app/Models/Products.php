<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    //
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'category_id',
        'hinh_anh',
        'gia',
        'gia_khuyen_mai',
        'so_luong',
        'ngay_nhap',
        'mo_ta',
    ];
    protected $date = ['deleted_at'];
    // tạo mối liên hệ với danh mục 
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
