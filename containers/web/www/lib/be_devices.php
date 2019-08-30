<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 04/02/2019
 * Time: 13:37
 */

require_once("sqlQuery.php");


if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM `pyover_devices` WHERE `name`='{$del}';";
    sqlexec($query, null,true);
}

header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php?pane=dashboard&sub=devices"); /* Redirect browser */


function getWeekData($uid) {
    $x = sqlexec('SELECT start_time,stop_time');

    if (date('w', time()) == 1)
        $beginning_of_week = strtotime('Today',time());
    else
        $beginning_of_week = strtotime('last Monday',time());

    if (date('w', time()) == 7)
        $end_of_week = strtotime('Today', time()) + 86400;
    else
        $end_of_week = strtotime('next Sunday', time()) + 86400;
}