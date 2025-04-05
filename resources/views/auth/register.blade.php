@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-success text-white text-center">
            <h3>Đăng ký</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{$error}}</li> 
            @endforeach
        </div>
    @endif
        <div class="card-body">
            <form method="POST" action="{{route('register-post')}}">
                @csrf

                <!-- Họ tên -->
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" id="password_confirmation" 
                           name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Đăng ký</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('login') }}">Đã có tài khoản? Đăng nhập</a>
        </div>
    </div>
@endsection
