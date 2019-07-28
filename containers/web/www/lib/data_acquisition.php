<?php
require("sqlQuery.php");


$json = file_get_contents('php://input');
$data = json_decode($json, true);


$statonUUID = $data['uuid'];
$start = $data['start_time'];
$stop  = $data['stop_time'];
sqlexec("INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`) VALUES ('$statonUUID', '$start', '$stop')");