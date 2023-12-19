@extends('backend.authenticate.app')
@section('form')
    <div id="wrapper">
        <form action="/admin" method="POST" id="form-login">
            @csrf
            <h1 class="form-heading">Admin</h1>
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" name="email" class="form-input  @error('user_name') is-invalid @enderror" required
                    placeholder="Tên đăng nhập">
                @error('user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" name="password" class="form-input  @error('password') is-invalid @enderror" required
                    placeholder="Mật khẩu">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="form-submit">Đăng Nhập</button>
        </form>
    </div>
@endsection
