<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Quản Trị')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/auth.css') }}"> --}}
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
            <li><a href="{{ route('admin.categories.index') }}">Danh mục</a></li>
            <li><a href="{{ route('admin.banners.index') }}">Banner</a></li>
            <li><a href="{{ route('admin.contacts.index') }}">contacts</a></li>
            <li><a href="{{ route('admin.customers.index') }}">customers</a></li>
            <li><a href="{{ route('admin.posts.index') }}">posts</a></li>
            <li><a href="{{ route('admin.reviews.index') }}">reviews</a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>@yield('title', 'Dashboard')</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Đăng xuất</button>
            </form>
            
            
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
