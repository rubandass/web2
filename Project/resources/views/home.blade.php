@extends('layouts.app')
@section('title','Fitness')
@section('fitness','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6" id="pie_chart" style="width:550px; height:350px">
                        </div>
                        <div class="col-md-6" id="bar_chart" style="width:550px; height:350px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('chartScript')
<script type="text/javascript">
    var analytics = <?php echo $name; ?>;
    var analyticsBar = <?php echo $date; ?>;
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawPieChart);

    // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
    function drawPieChart() {

        // Create the data table.
        var dataPie = new google.visualization.arrayToDataTable(analytics);
        var optionsPie = {
            title: 'Activities',
            //is3D: true,
            pieHole: 0.3
        };

        var data = new google.visualization.arrayToDataTable(analyticsBar);
        var options = {
            title: 'Sleep hrs'
        };

        var chartPie = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chartPie.draw(dataPie, optionsPie);


        var chartBar = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
        chartBar.draw(data, options);
    }
</script>

@endsection