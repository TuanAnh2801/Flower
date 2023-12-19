@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nhập email của bạn') }}</div>

                <form action="{{ url("user/changePassword/forget-password") }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if ( Session::has('error1') )
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ Session::get('error1') }}</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" style="background: greenyellow;     border-radius: 5px; padding:3px">Gửi Email Xác Nhận</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@if (session('sendmail'))
<div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
    {{ session('sendmail') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endsection
<script>
    // Tự động ẩn đoạn thông báo sau 5 giây
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>

