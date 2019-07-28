<?php
require("sqlQuery.php");



$sql = "INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`) VALUES (\'a7ca7fa9-b12b-11e9-abd4-b827eb5d7d84\', \'3123\', \'123123\')";
$x = sqlexec($sql,null,true);
