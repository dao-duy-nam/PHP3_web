<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customers extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'customers';
    protected $fillable = [
        'name',
        'email',
        'so_dien_thoai',
        'dia_chi'
    ];
    protected $date = ['deleted_at'];
}
