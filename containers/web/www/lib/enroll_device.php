<?php
require("sqlQuery.php");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

//  Start enroll process

$stationName = $data['STATION']['name'];
$stationLocation = $data['STATION']['location'];
$stationDescription = $data['STATION']['description'];


$enroll_sql = "INSERT INTO `pyover_devices` (`UID`, `name`, `location`,`Description`, `status`) VALUES (uuid(), \'$stationName\', \'$stationLocation\', \'$stationDescription\', \'N/A\')";

$enroll_query = sqlexec($enroll_sql, $no_output=true);

echo $enroll_query;





