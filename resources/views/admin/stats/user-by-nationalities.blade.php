<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">المستخدمين حسب الجنسية</h3>
    </div>
    <div class="box-body">
        <canvas id="userByNationality" width="200" height="100"></canvas>
    </div>
</div>

@section('js')
@parent
<script>
    var ctx = document.getElementById("userByNationality");
    var userByNationality = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                @foreach ($userByNationality as $e)
                    "{{ $e->nationality->name }} ({{$e->count}})", 
                @endforeach
            ],
            datasets: [{
                data: [
                @foreach ($userByNationality as $e)
                    "{{ $e->count }}", 
                @endforeach
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
            }]
        }
    });
</script>

@stop