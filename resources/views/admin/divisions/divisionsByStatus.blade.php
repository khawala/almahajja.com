@php
    $allStatus = config('variables.status');
@endphp

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">الدورات حسب الحالة</h3>
    </div>
    <div class="box-body">
        <canvas id="divisionsByStatus" width="200" height="100"></canvas>
    </div>
</div>

@section('js')
@parent
<script>
    var ctx = document.getElementById("divisionsByStatus");
    var divisionsByStatus = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                @foreach ($divisionsByStatus as $e)
                    "{{ $allStatus[$e->status] }} ({{$e->count}})", 
                @endforeach
            ],
            datasets: [{
                data: [
                @foreach ($divisionsByStatus as $e)
                    "{{ $e->count }}", 
                @endforeach
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }]
        }
    });
</script>

@stop