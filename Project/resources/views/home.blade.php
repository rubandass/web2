@extends('layouts.app')
@section('title','Fitness')
@section('fitness','active')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p class="alert alert-success">Your longest workout : <b>{{$longestWorkoutName}}</b> | {{(int)($longestWorkoutTime/60)}} Hr {{(int)($longestWorkoutTime%60)}} mins</p>
                        </div>
                        <div class="col-md-6">
                            <p class="alert alert-success">Your furthest distance : <b>{{$furthestDistanceName}}</b> | {{$furthestDistanceKm}} kms</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div style="margin-left: 10px; margin-right: auto; margin-top: 20px; width: 200px;" id="pie_chart">
                            </div>
                            <!-- <h5 class="text-center">Activities</h5> -->
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="text-center mt-5" style="margin-left: auto; margin-right: auto; margin-top: 20px; width: 200px;" id="gauge_chart"></div>
                            <h5 class="text-center">Mood index</h5>
                        </div>
                        <div class="col-xs-12 col-md-4 text-center">
                            <div class="text-center mt-5" style="margin-left: auto; margin-right: auto; margin-top: 20px; width: 200px;" id="sleep_gauge_chart"></div>
                            <h5>Sleep index</h5>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-12 col-md-6" id="bar_chart">
                        </div>
                        <div class="col-xs-12 col-md-6" id="line_chart">
                            Line chart
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-xs-12  col-md-12" id="bar_compare_chart">
                            Compare chart
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
    var analyticsPie = <?php echo $name; ?>;
    var analyticsBar = <?php echo $date; ?>;
    var analyticsSleepGauge = <?php echo $sleep; ?>;
    var analyticsGauge = <?php echo $mood; ?>;
    var analyticsLine = <?php echo $weight; ?>;
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart', 'gauge']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table, instantiates the pie chart, passes in the data and draws it.
    function drawChart() {

        // Create the data table.
        var dataPie = new google.visualization.arrayToDataTable(analyticsPie);
        var optionsPie = {
            title: 'Activities',
            width: 450,
            height: 350,
            //is3D: true,
            pieHole: 0.3
        };

        var dataBar = new google.visualization.arrayToDataTable(analyticsBar);
        var optionsBar = {
            title: 'Calories',
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'Calories'
            },
            width: '100%',
            height: 350
        };

        var dataSleepGauge = new google.visualization.arrayToDataTable(analyticsSleepGauge);
        var optionsSleepGauge = {
            title: 'Average sleep hrs',
            max: 10,
            min: 0,
            width: '100%',
            height: 200,
            redFrom: 0,
            redTo: 4,
            yellowFrom: 4,
            yellowTo: 7,
            greenFrom: 7,
            greenTo: 10,
            minorTicks: 5
        };

        var dataGauge = new google.visualization.arrayToDataTable(analyticsGauge);
        var optionsGauge = {
            title: 'Current mood',
            max: 10,
            min: 0,
            width: '100%',
            height: 200,
            redFrom: 0,
            redTo: 2,
            yellowFrom: 2,
            yellowTo: 6,
            greenFrom: 6,
            greenTo: 10,
            minorTicks: 5
        };

        var dataLine = new google.visualization.arrayToDataTable(analyticsLine);
        var optionsLine = {
            title: 'Weight in kg (Weekly)',
            curveType: 'function',
            hAxis: {
                title: 'Date',
                slantedText: true,
                slantedTextAngle: 30
            },
            vAxis: {
                title: 'Weight in kg'
            },
            legend: {
                position: 'right'
            },
            width: '100%',
            height: 350
        };

        var maxMinWorkoutTime = <?php echo $maxMinWorkoutTime; ?>;
        var userWorkoutTime = <?php echo $userWorkoutTime; ?>;
        let dates = []
        let mapdata = [
            ['Date', 'Min', 'Yours', 'Max']
        ];
        maxMinWorkoutTime.forEach(function(item) {
            if (!dates.includes(item["date"])) {
                dates.push(item["date"])
            }
        });
        userWorkoutTime.forEach(function(item) {
            if (!dates.includes(item["date"])) {
                dates.push(item["date"])
            }
        });
        dates.forEach(function(date) {
            let mapdataEntry = [new Date(date), 0, 0, 0]
            maxMinWorkoutTime.forEach(function(item) {
                if (item["date"] === date) {
                    mapdataEntry[3] = parseInt(item["max"])
                    mapdataEntry[1] = parseInt(item["min"])
                }
            });
            userWorkoutTime.forEach(function(item) {
                if (item["date"] === date) {
                    mapdataEntry[2] = parseInt(item["time"])
                }
            });
            mapdata.push(mapdataEntry)
        });
        console.log(mapdata);
        var dataBarCompare = new google.visualization.arrayToDataTable(mapdata);
        var optionsBarCompare = {
            title: 'Compare',
            hAxis: {
                title: 'Date',
                format: 'd/yy'
            },
            vAxis: {
                title: 'Time'
            },
            seriesType: 'bars',
            series: {
                3: {
                    type: 'line'
                }
            },
            'width': '100%',
            'height': 300
        };

        var chartPie = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chartPie.draw(dataPie, optionsPie);


        var chartBar = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
        chartBar.draw(dataBar, optionsBar);

        var chartSleepGauge = new google.visualization.Gauge(document.getElementById('sleep_gauge_chart'));
        chartSleepGauge.draw(dataSleepGauge, optionsSleepGauge);

        var chartGauge = new google.visualization.Gauge(document.getElementById('gauge_chart'));
        chartGauge.draw(dataGauge, optionsGauge);

        var chartLine = new google.visualization.LineChart(document.getElementById('line_chart'));
        chartLine.draw(dataLine, optionsLine);

        var chartBarCompare = new google.visualization.ComboChart(document.getElementById('bar_compare_chart'));
        chartBarCompare.draw(dataBarCompare, optionsBarCompare);
    }
</script>

@endsection