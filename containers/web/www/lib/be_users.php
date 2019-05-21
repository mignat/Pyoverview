<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 21/11/2018
 * Time: 18:27
 */
if ($_SESSION['privileges'] != 1) {
    #include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
require_once("sqlQuery.php");
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');


if ($_SESSION['privileges'] != 1) {
    include("../error.php?errortype=Access_denied");
    exit();

}

if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM `pyover_users` WHERE `username`='{$del}';";
    sqlexec($query, null,true);
}
if (isset($_GET['add'])){
    $username = $_GET['add'];
    $fullname = $_GET['full_name'];
    $password = $_GET['password'];
}

header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php?pane=settings&sub=um"); /* Redirect browser */