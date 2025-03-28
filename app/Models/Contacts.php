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
        'ten',
        'email',
        'phone',
        'tin_nhan'
    ];
}
