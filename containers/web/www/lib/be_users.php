<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 21/11/2018
 * Time: 18:27
 */

require_once("sqlQuery.php");

if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM `pyover_users` WHERE `username`='{$del}';";

    sqlexec($query, null,true);
}
header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php?pane=settings&sub=um"); /* Redirect browser */