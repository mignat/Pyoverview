<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 04/02/2019
 * Time: 13:37
 */

require_once("sqlQuery.php");

if ($_SESSION['privileges'] != 1) {
    include("../error.php?errortype=Access_denied");
    exit();

}

if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM `pyover_devices` WHERE `name`='{$del}';";
    sqlexec($query, null,true);
}
header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php?pane=dashboard&sub=devices"); /* Redirect browser */