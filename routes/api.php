<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
 // mặc định api sẽ trỏ tới 5 hàm mặc định trong controller api
 // nếu muốn tạo ra các phương thức mới trong controller api
 //thì ta phải tạo thêm các route khác để trỏ riêng tới phương thức đó
 // route tạo thêm phải đặt bên trên apiResource
 Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('products',ProductController::class)->middleware('auth:sanctum');