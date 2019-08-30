<?php
    require_once ('../../lib/sqlQuery.php');
    require_once ('../../lib/table_creator.php');
$device = $_GET['device'];
$device_data = sqlexec("select * from pyover_devices where name = \"$device\"");
$device_uuid = $device_data[0]['UID'];
$device_description = $device_data[0]['Description'];
$table_usetime = new table_creator("SELECT DATE_FORMAT(FROM_UNIXTIME(start_time) ,'%Y-%m-%d %H:%i:%s') AS 'Start Time' ,DATE_FORMAT(FROM_UNIXTIME(end_time),'%Y-%m-%d %H:%i:%s') AS 'Stop Time' FROM `pyover_usetime` where `device_uid` = '$device_uuid' order by DATE_FORMAT(FROM_UNIXTIME(end_time),'%Y-%m-%d %H:%i:%s') DESC LIMIT 10 ");
if ($table_usetime->run_query() == ""){
    echo "<div class='jumbotron'>";
    echo "<h1> ERROR </h1>";
    echo "<hr class=\"my-4\">";
    echo "<p>Station not initialized or in ERROR</p>";
    exit();
}
?>

<link href='../../lib/calendar/core/main.css' rel='stylesheet' />
<link href='../../lib/calendar/daygrid/main.css' rel='stylesheet' />
<link href='../../lib/calendar/timegrid/main.css' rel='stylesheet' />
<link href='../../lib/calendar/list/main.css' rel='stylesheet' />
<script src='../../lib/calendar/core/main.js'></script>
<script src='../../lib/calendar/interaction/main.js'></script>
<script src='../../lib/calendar/daygrid/main.js'></script>
<script src='../../lib/calendar/timegrid/main.js'></script>
<script src='../../lib/calendar/list/main.js'></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            defaultDate: '2019-08-12',
            editable: true,
            navLinks: true, // can click day/week names to navigate views
            eventLimit: true, // allow "more" link when too many events
            events: {
                url: 'lib/get-events.php',
                failure: function() {
                    document.getElementById('script-warning').style.display = 'block'
                }
            },
            loading: function(bool) {
                document.getElementById('loading').style.display =
                    bool ? 'block' : 'none';
            }
        });

        calendar.render();
    });

</script>
<style>

    body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        font-size: 14px;
    }

    #script-warning {
        display: none;
        background: #eee;
        border-bottom: 1px solid #ddd;
        padding: 0 10px;
        line-height: 40px;
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        color: red;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 10px;
    }

</style>
<div class="container-fluid">
    <div>
        <table class="table table-sm" style="padding-bottom: 50px">
            <thead>
            </thead>
            <tbody>
            <tr>

                <td>UUID</td>
                <td><?php echo $device_uuid; ?></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><?php echo $device_description; ?></td>
            </tr>
            </tbody>
        </table>

    </div>
    <script src="../../scripts/Chart.bundle.js"></script>
    <div class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Last 7 days
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Last 7 days</a>
                <a class="dropdown-item" href="#">last month</a>
                <a class="dropdown-item" href="#">last year</a>
            </div>
        </div>
        <canvas id="myChart" width="400" height="100"></canvas>
       <!-- --><?php
/*        echo "<hr class=\"my-4\">";
        $table_usetime->genTable();
        */?>
    </div>
        <div id='script-warning'>
            <code>php/get-events.php</code> must be running.
        </div>

        <div id='loading'>loading...</div>
     <div id='calendar'></div>

    <script>

        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday','Sunday'],
                datasets: [{
                    label: '# of activations per day',
                    data: [1,2,3,5,6,7,8],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
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


</div>