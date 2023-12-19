<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"> --}}
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}" />
    <title>Admin</title>
</head>

<body>

    <div class="d-flex" id="wrapper">
        {{-- @include('backend.authenticate.layouts._nav') --}}
        @include('backend.authenticate.layouts._nav')
        <div id="content" class="container-fluid px-4">
            @include('backend.authenticate.layouts._header')
            {{-- <h1>xin chào</h1> --}}
            @yield('content')
            @if (session('login'))
                <div class="alert alert-info alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
                    {{ session('login') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('Logout'))
                <div class="alert alert-info alert-dismissible fade show position-fixed bottom-0 end-0" role="alert">
                    {{ session('Logout') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>

    </div>
    {{-- scrip off dash --}}
</body>
<script>
    
    setTimeout(function() {
        document.querySelector('.alert').classList.remove('show');
    }, 5000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
</script>

<script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>

@stack('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#myID", {
        // enableTime: true,
        // dateFormat: "Y-m-d"
        onClose: function(selectedDates, dateStr, instance) {
            document.getElementById("myID").value = dateStr;
        }
    });
</script>
{{-- <script>
    flatpickr("#myID", {
        onClose: function(selectedDates, dateStr, instance) {
            // Lấy giá trị ngày được chọn
            var selectedDate = dateStr;
            
            // Truyền giá trị ngày vào trường input tương ứng
            document.getElementById("myInput").value = selectedDate;
        }
    });
</script> --}}



</html>
