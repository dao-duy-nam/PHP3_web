@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    {{-- <h2>Danh Sách Sản Phẩm</h2> --}}
    <!-- Form tìm kiếm -->
    <div class="card shadow-sm mb-4">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-search"></i> Tìm kiếm sản phẩm</h5>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.products.index') }}">
                <div class="row g-3">
                    <!-- Mã sản phẩm -->
                    <div class="col-md-4">
                        <label for="ma_san_pham" class="form-label">Mã sản phẩm</label>
                        <input type="text" id="ma_san_pham" name="ma_san_pham" class="form-control mb-3"
                            placeholder="Nhập mã sản phẩm" value="{{ request('ma_san_pham') }}">
                    </div>
    
                    <!-- Tên sản phẩm -->
                    <div class="col-md-4">
                        <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                        <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control mb-3"
                            placeholder="Nhập tên sản phẩm" value="{{ request('ten_san_pham') }}">
                    </div>
    
                     <!-- Chọn danh mục -->
        <div class="col-md-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <select id="category_id" name="category_id" class="form-control mb-2">
                <option value="">Tất cả</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" >
                        {{ $category->ten_danh_muc }}
                    </option>
                @endforeach
            </select>
        </div>
    
                    <!-- Ngày nhập -->
                    <div class="col-md-4">
                        <label for="ngay_nhap" class="form-label">Ngày nhập</label>
                        <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control mb-3"
                            value="{{ request('ngay_nhap') }}">
                    </div>
    
                    <!-- Trạng thái -->
                    <div class="col-md-4">
                        <label for="trang_thai" class="form-label">Trạng thái</label>
                        <select id="trang_thai" name="trang_thai" class="form-control mb-3">
                            <option value="1">Nhấn để chọn</option>
                            
                            <option value="1">Còn hàng</option>
                            <option value="0">Hết hàng</option>
                        </select>
                    </div>
    
                    <div class="col-md-4">
                        <label for="gia_khoang" class="form-label">Khoảng giá</label>
                        <div class="input-group">
                            <input type="number" id="gia_min" name="gia_min" class="form-control" 
                                   placeholder="Từ" value="{{ request('gia_min') }}" min="0">
                            <span class="input-group-text">-</span>
                            <input type="number" id="gia_max" name="gia_max" class="form-control" 
                                   placeholder="Đến" value="{{ request('gia_max') }}" min="0">
                        </div>
                    </div>
                    
    
                    <!-- Nút tìm kiếm & Làm mới -->
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fas fa-search"></i> Tìm kiếm
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-sync"></i> Làm mới
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- hiển thị thông báo  --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
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
                <th>Ngày nhập</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedProducts  as $key => $product)
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
                    <td>{{ $product->ngay_nhap }}</td>
                    <td>{{ $product->trang_thai == 1?'còn hàng':'hết hàng' }}</td>
                    <td>
                       
                        <form action="{{ route('admin.products.restore', ['id' => $product->id]) }}" method="POST"
                            onsubmit="return confirm('Bạn có muốn khôi phục không?')" class="d-inline">
                          @csrf
                          <button type="submit" class="btn btn-success btn-sm">Khôi phục</button>
                      </form>
                      
                      
                      
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3">
        {{ $deletedProducts->links('pagination::bootstrap-5') }}
    </div>
@endsection
