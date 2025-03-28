@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    <h2>Chi tiết Sản Phẩm</h2>

    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Hình Ảnh</th>
                <th>Giá</th>
                <th>Giá Khuyến Mại</th>
                <th>Số Lượng</th>
                <th>Mô Tả</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($product as $key ) --}}
                <tr>
                    <td>{{ $product->ma_san_pham }}</td>
                    <td>{{ $product->ten_san_pham }}</td>
                    <td>{{ $product->category->ten_danh_muc ?? 'Không có' }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->hinh_anh) }}" width="80">
                    </td>
                    <td>{{ number_format($product->gia, 0, ',', '.') }}đ</td>
                    <td>{{ number_format($product->gia_khuyen_mai, 0, ',', '.') }}đ</td>
                    <td>{{ $product->so_luong }}</td>
                    <td>{{ Str::limit($product->mo_ta, 50) }}</td>
                    <td>
                    
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-primary">Delete</a>
                </td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    <!-- Phân trang -->
    {{-- <div class="d-flex justify-content-end mt-3">
        {{ $product->links('pagination::bootstrap-5') }}
    </div> --}}
@endsection
