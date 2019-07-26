<?php
require("sqlQuery.php");

$json = file_get_contents('php://input');
$data = json_decode($json,true);

//  Start enroll process



$enroll_sql = "INSERT INTO `pyover_devices` (`UID`, `name`, `location`,`Description`, `status`) VALUES (uuid(), \'$data['STATION']['name']\', \'$data['STATION']['location']\', \'$data['STATION']['description']\', \'N/A\')";

enroll_query = sqlexec($enroll_sql);



