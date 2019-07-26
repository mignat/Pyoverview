<?php
require("sqlQuery.php");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

//  Start enroll process

//$stationName = $data['STATION']['name'];
//$stationLocation = $data['STATION']['location'];
//$stationDescription = $data['STATION']['description'];

sqlexec("INSERT INTO `pyover_devices` (`UID`, `name`, `location`, `Description`, `status`, `last_contact`) VALUES (uuid(), 'Pytest', 'Sala 1', 'CEVA', 'N/A', NULL)", null,true);

echo "Done";




