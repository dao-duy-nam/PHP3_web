@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header bg-primary text-white text-center">
            <h3>Đăng nhập</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                   <li>{{$error}}</li> 
                @endforeach
            </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{route('login-post')}}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ghi nhớ đăng nhập -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('register') }}">Chưa có tài khoản? Đăng ký</a>
        </div>
    </div>
@endsection
