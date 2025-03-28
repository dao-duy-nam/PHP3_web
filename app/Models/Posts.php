<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'content',
        'image',
    ];
    protected $date = ['deleted_at'];
}
