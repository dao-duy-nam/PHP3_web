<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'reviews';
    protected $fillable = [
        'rating',
        'danh_gia',
        'customer_id'
    ];
    protected $date = ['deleted_at'];
}
