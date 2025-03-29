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
    <a href="{{route('admin.categories.create')}}" class="btn btn-primary">Create</a>
    <a href="{{route('admin.categories.deleted')}}" class="btn btn-danger">Thùng rác</a>
    <table border="1" width="100%" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Danh Mục</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <td>{{ $category->ten_danh_muc }}</td>
                    <td>{{ $category->trang_thai == 1?'Hoạt động':'Ẩn' }}</td>
                    <td>
                      
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST"
                            onsubmit="return confirm('bạn muốn xóa ko')" class="d-inline"
                            >
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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>
@endsection
