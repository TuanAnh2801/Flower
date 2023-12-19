<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/login.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="contact-box">
			<div class="left">
                <img style="width:450px; hieght:300px" src="{{ asset("frontend/img/login/rose-1460773_960_720.png") }}" alt="">
            </div>
			<div class="right">
				@if ( Session::has('error') )
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>{{ Session::get('error') }}</strong> 
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>
				@endif

				<h2>Đăng Nhập   </h2>
                <form method="POST" action="{{ url('/login') }}">
					@csrf
					<input type="text" name="email" class="field" placeholder="Email" value="{{ old('email') }}">
					@if ($errors->has('email'))
						<div class="alert alert-danger">{{ $errors->first('email') }}</div>
					@endif
				
					<input type="password" name="password" class="field" placeholder="Password">
					@if ($errors->has('password'))
						<div class="alert alert-danger">{{ $errors->first('password') }}</div>
					@endif
				
					<button type="submit" class="btn">Đăng Nhập</button>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>