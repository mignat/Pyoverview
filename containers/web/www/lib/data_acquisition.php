<?php
require("sqlQuery.php");

$sql = "INSERT INTO `pyover_usetime` (`device_uid`, `start_time`, `end_time`) VALUES (\'af3e2304-b11c-11e9-af1b-b827eb5d7d84\', \'123131\', \'12312312\')";
sqlexec($sql,null,true);