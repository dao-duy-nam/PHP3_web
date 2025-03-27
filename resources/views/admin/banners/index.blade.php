@extends('layouts.admin')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('title', 'Danh Sách Sản Phẩm')

@section('content')
    {{-- hiển thị thông báo  --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Create</a>
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Hình Ảnh</th>
                <th>Link</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $key => $banner)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $banner->title }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $banner->image) }}" width="80">
                    </td>
                    <td>{{ $banner->link }}</td>

                    <td>
                       
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-primary">Edit</a>

                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST"
                            onsubmit="return confirm('bạn muốn xóa ko')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-end mt-3">
        {{ $banners->links('pagination::bootstrap-5') }}
    </div>
@endsection
