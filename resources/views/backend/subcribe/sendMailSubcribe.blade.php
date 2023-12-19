
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Chào Bạn</p>
<p>Chúc bạn có một ngày vui vẻ</p>
{{-- @dd($latestText) --}}
<p>   <a href="{{ route("flower.index") }}">{{$latestText }}</a></p>
</body>
</html>