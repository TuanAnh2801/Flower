@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nhập thông tin đăng ký') }}</div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_name">{{ __('Tên người dùng') }}</label>
                                <input type="text" name="user_name" id="user_name"
                                    class="form-control @error('user_name') is-invalid @enderror" required>
                                @error('user_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="first_name">{{ __('Họ') }}</label>
                                <input type="text" name="first_name" id="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror" required>
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">{{ __('Tên') }}</label>
                                <input type="text" name="last_name" id="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror" required>
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Địa chỉ email') }}</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="telephone">{{ __('Số điện thoại') }}</label>
                                <input type="tel" name="telephone" id="telephone"
                                    class="form-control @error('telephone') is-invalid @enderror" required>
                                @error('telephone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Mật khẩu') }}</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{ __('Xác nhận mật khẩu') }}</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- 
                            <div class="form-check">
                                <input class="form-check-input" id="role" name="role" type="checkbox" value="3"
                                    id="flexCheckChecked" {{ old('role') ? 'checked' : '' }}>
                                <label style="color:black" class="form-check-label" for="flexCheckChecked">
                                    Xac Nhan
                                </label>
                                @if ($errors->has('role'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('role') }}
                                    </div>
                                @endif
                            </div> --}}

                            <div>
                                <input type="checkbox" id="address-checkbox">
                                <label for="address-checkbox">Địa Chỉ</label>
                            </div>
                            <div id="address-fields" style="display:none;">
                                <div>
                                    <label for="address">Địa Chỉ</label>
                                    <input type="address" name="address" id="address"
                                        class="form-control @error('address') is-invalid @enderror">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="city">Thành Phố</label>
                                    <input type="city" name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror">
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="country">Nước</label>
                                    <input type="country" name="country" id="country"
                                        class="form-control @error('country') is-invalid @enderror">
                                    @error('country')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <button style="display: inline-block;
                            padding: 0.5rem 1rem;
                            font-size: 1rem;
                            font-weight: bold;
                            color: #fff;
                            background-color: #007bff;
                            border: none;
                            border-radius: 0.25rem;
                            cursor: pointer;"
                                type="submit" class="my-button">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var addressCheckbox = document.getElementById("address-checkbox");
            var addressFields = document.getElementById("address-fields");

            addressCheckbox.addEventListener("click", function() {
                if (addressCheckbox.checked) {
                    addressFields.style.display = "block";
                } else {
                    addressFields.style.display = "none";
                }
            });
        </script>
    @endsection
