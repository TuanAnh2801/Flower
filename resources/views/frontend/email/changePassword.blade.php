<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Xin chào {{ $custormer->user_name }}</h1>
                <p>vui lòng click dưới đây để đổi mật khẩu</p>
                <p>
                    <a href="{{ url("user/changePassword/get-password/{$custormer->id}/{$custormer->token}") }}">Đặt Lại Mật Khẩu</a>
                    
                </p>
                {{-- <div class="card-header">{{ __('Nhập Lại Mật Khẩu Của bạn') }}</div>

                <form action="{{ url('user/changePassword/updateChangePassword') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body"> --}}
                     

                        {{-- <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        {{-- <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="email"
                                placeholder="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Comprimt Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="email"
                                placeholder="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" style="background: greenyellow;     border-radius: 5px; padding:3px">Submit</button>
                    </div> --}}



                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>