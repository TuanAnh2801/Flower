@extends('backend.authenticate.layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Admin') }}</div>

                <form action="{{ url('admin/createAdmin') }}" method="POST">
                    @csrf
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
                            <label for="user_name" class="form-label">user_name</label>
                            <input name="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"
                                placeholder="user_name">
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                      

                        <div class="mb-3">
                            <label for="first_name" class="form-label">first_name</label>
                            <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                placeholder="first_name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                          
                        <div class="mb-3">
                            <label for="last_name" class="form-label">last_name</label>
                            <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                placeholder="last_name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telephone</label>
                            <input name="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                placeholder="telephone">
                            @error('telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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
                        <button type="Create Admin" style="background: greenyellow;     border-radius: 5px; padding:3px">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@if (session('updateAdmin'))
<div class="alert alert-primary alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
    {{ session('updateAdmin') }}
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
