<?php
require("sqlQuery.php");

$x = sqlexec("SELECT * FROM `pyover_usetime`");


echo $x[1]['start_time'];