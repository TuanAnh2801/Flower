@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nhập email của bạn') }}</div>

                <form action="{{ url('user/changePassword/updateChangePassword') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                     

                        {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="email"
                                placeholder="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" style="background: greenyellow;     border-radius: 5px; padding:3px">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
