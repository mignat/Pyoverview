<?php
require("sqlQuery.php");


$json = file_get_contents('php://input');
$data = json_decode($json, true);
echo "Test";

$uuid = $data['uuid'];
$start = $data['start_time'];
$stop  = $data['stop_time'];

echo "Test2";
$sql = "INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`) VALUES ('{$uuid}', '{$start}', '{$stop}')";
sqlexec($sql,null,true);