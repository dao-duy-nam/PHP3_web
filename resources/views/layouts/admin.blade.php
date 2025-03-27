<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang Quản Trị')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
            <li><a href="#">Banner</a></li>
            <li><a href="#">Người dùng</a></li>
            <li><a href="#">Cài đặt</a></li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>@yield('title', 'Dashboard')</h1>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
