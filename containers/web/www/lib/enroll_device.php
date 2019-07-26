<?php
require("sqlQuery.php");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

//  Start enroll process

$stationName = $data['STATION']['name'];
$stationLocation = $data['STATION']['location'];
$stationDescription = $data['STATION']['description'];

$uuid = sqlexec("select uuid()")[0]['uuid()'];

echo "$uuid\n";

$enroll_query = sqlexec("INSERT INTO `pyover_devices` (`UID`, `name`, `location`, `Description`, `status`, `last_contact`) VALUES ('$uuid', '$stationName', '$stationLocation', '$stationDescription', 'N/A', NULL)", null,true);

echo "status:$enroll_query";


echo "Done";




