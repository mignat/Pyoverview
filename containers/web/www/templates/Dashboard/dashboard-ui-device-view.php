<?php
    require_once ('../../lib/sqlQuery.php');
    require_once ('../../lib/table_creator.php');
$device = $_GET['device'];
$device_data = sqlexec("select * from pyover_devices where name = \"$device\"");
$device_uuid = $device_data[0]['UID'];
$device_description = $device_data[0]['Description'];
$table = new table_creator("SELECT DATE_FORMAT(FROM_UNIXTIME(start_time) ,'%Y-%m-%d %H:%i:%s') AS 'Start Time' ,DATE_FORMAT(FROM_UNIXTIME(end_time),'%Y-%m-%d %H:%i:%s') AS 'Stop Time' FROM `pyover_usetime` where `device_uid` = '$device_uuid' order by DATE_FORMAT(FROM_UNIXTIME(end_time),'%Y-%m-%d %H:%i:%s') DESC LIMIT 5 ");
if ($table->run_query() == ""){
    echo "<div class='jumbotron'>";
    echo "<h1> ERROR </h1>";
    echo "<hr class=\"my-4\">";
    echo "<p>Station not initialized or in ERROR</p>";
    exit();
}
?>

<div class="container-fluid">
    <div class="jumbotron">
        <h5>UID: <?php echo $device_uuid; ?></h5>
        <h5>Description: <?php echo $device_description; ?></h5>
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
        <h4 style="padding-top: 40px">Latest Data</h4>
        <?php
        echo "<hr class=\"my-4\">";
        $table->genTable();
        ?>

    </div>
    <script>

        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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