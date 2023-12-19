@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đặt Lại Mật Khẩu') }}</div>
                    {{-- {{ url("user/changePassword/post-password/{custormer}/{token}") }} --}}
                    <form action="{{ url("user/changePassword/post-password/{$user->id}/{$user->token}") }}" method="POST"
                        role="form">
                        @csrf
                        {{-- <input type="hidden" name='token' value="{{ $token }}"> --}}
                        <div class="card-body">


                            {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}


                            {{-- <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input name="Email" type="Email" class="form-control @error('Email') is-invalid @enderror" id="Email"
                                placeholder="Email" value="{{ $email ?? old('email') }}" >
                            @error('Email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}
                            <div class="mb-3">
                                <label for="password">Nhap mat khau</label>
                                <input type="text" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Nhap lai mat khau</label>
                                <input type="text" name="password_confirmation" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" style="background: greenyellow;     border-radius: 5px; padding:3px">Đặt
                                Lại Mật Khẩu</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
