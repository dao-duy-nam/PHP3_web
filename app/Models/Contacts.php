<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacts extends Model
{
    //
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
        'name',
        'email',
        'dien_thoai',
        'noi_dung'
    ];
}
