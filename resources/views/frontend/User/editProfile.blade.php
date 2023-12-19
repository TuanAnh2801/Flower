@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('user/updateProfile') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            {{-- <div>
                <label for="user_name">Nhap Ten Nguoi Dung</label>
                <input type="text" name="user_name" id="user_name"
                    class="form-control @error('user_name') is-invalid @enderror">
                @error('user_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div>
                <label for="first_name">Nhap Ten</label>
                <input type="text" name="first_name" id="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name', $user->first_name) }}">
                @error('first_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="last_name">Nhap Ho</label>
                <input type="text" name="last_name" id="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name', $user->last_name) }}">
                @error('last_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="email">Nhap email</label>
                <input type="eamil" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="telephone">Nhap Số Điện Thoại</label>
                <input type="telephone" name="telephone" id="telephone"
                    class="form-control @error('telephone') is-invalid @enderror"
                    value="{{ old('telephone', $user->telephone) }}">
                @error('telephone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div>
                <label for="password">Nhap mat khau</label>
                <input type="text" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="password">Nhap lai mat khau</label>
                <input type="text" name="password_confirmation" id="password"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}


            {{-- <div class="form-check">
                <input class="form-check-input" id="role" name="role" type="checkbox" value="3"
                    id="flexCheckChecked" checked ? checked : @error('role') is-invalid @enderror>
                <label style="color:black" class="form-check-label" for="flexCheckChecked">
                    Xac Nhan
                </label>
                @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}


            <div>
                <label for="address">Phường/Xã</label>
                <input type="address" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror"value="{{ old('address', $userAddress->address) }}">
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <label for="city">Thành Phố</label>
                <input type="city" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                    value="{{ old('city', $userAddress->city) }}">
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div>
                <label for="country">Nước</label>
                <input type="country" name="country" id="country"
                    class="form-control @error('country') is-invalid @enderror"
                    value="{{ old('country', $userAddress->country) }}">
                @error('country')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div>
                    <label >Avatar</label>
                    <input type="file" multiple name='avatar' value="{{ $user->avatar }}"/>
                </div> --}}


            {{-- <div class="form-group mb-3">
                    <div class="col-sm-10">
                      
                            <img src="{{ asset('storage/frontend/userProfile/'.$user['avatar']) }}" style="width:220px; height:200px" />
                    
            
                        <div class="fallback">
                            <input type="file" multiple name='avatar' value="{{ $user->avatar }}"/>
                        @foreach ($user->avatar as $image)
                            <input type="hidden" name="avatar" value="{{ $user->$image }}" />
                        @endforeach
            
                        @error('avatar')
                            <div class="text-danger">
                            <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>
                </div> --}}

            <div class="form-group mb-3">
                <div class="col-sm-10">
                    <img src="{{ asset('storage/frontend/userProfile/' . $user['avatar']) }}"
                        style="width:220px; height:200px" />
                    <div class="fallback">
                        <input type="file" name='avatar' />
                        @if ($user->avatar && $user['avatar'] instanceof Illuminate\Http\UploadedFile)
                            <input type="hidden" name="avatar" value="{{ $user['avatar']->getClientOriginalName() }}" />
                        @elseif ($user->avatar)
                            <input type="hidden" name="avatar" value="{{ $user['avatar'] }}" />
                        @endif
                        {{-- <input type="hidden" name="avatar" value="{{ $user['avatar'] }}" /> --}}
                    </div>
                    @error('avatar')
                        <div class="text-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <button
                style="display: inline-block;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                font-weight: bold;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 0.25rem;
                cursor: pointer;"
                type="submit" class="my-button">Cập Nhật</button>
        </form>
    </div>
@endsection
