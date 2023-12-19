@extends('backend.authenticate.layouts.app')
@section('content')
    @include('backend.authenticate.layouts._dashboard')
    <div style="width: 1200px; height:650px; front-size:50px">

        <canvas id="revenue-chart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('revenue-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Doanh thu',
                    data: <?php echo json_encode($revenues); ?>,
                    backgroundColor: 'rgb(0,255,255)',
                    borderColor: 	'rgb(124,252,0)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection

