@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> sửa banners</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.banners.update', $banners->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <!-- Tên sản phẩm -->
                  <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" id="title" value="{{$banners->title}}" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mã sản phẩm -->
                <div class="mb-3">
                    <label for="image" class="form-label">ảnh banner</label>
                    <input type="file" id="image" value="{{ old('image') }} {{$banners->image}}" name="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    @if ($banners->image)
                    <img src="{{asset('storage/'. $banners->image)}}" alt="" width="200px">
                    @else 
                    Không có hình ảnh
                    @endif
                </div>
               

                <!-- Giá và Giá Khuyến Mại -->
                <div class="mb-3 ">
                    
                        <label for="link" class="form-label @error('link') is-invalid @enderror">link banner</label>
                        <input type="text" id="link" value="{{ old('link') }} {{$banners->link}}" name="link" class="form-control" min="0">
                        @error('link')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    
                </div>

                <!-- Nút Submit -->
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Lưu banners
                </button>
            </form>
        </div>
    </div>
@endsection
