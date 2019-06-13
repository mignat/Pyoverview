<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 21/11/2018
 * Time: 18:27
 */


echo "test";

/*if ($_SESSION['permissions'] != 1) {
    include("../error.php?errortype=Access_denied");
    exit();
}*/

require_once("sqlQuery.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');

if (isset($_GET['delete'])) {
    $del = $_GET['delete'];
    $query = "DELETE FROM `pyover_users` WHERE `username`='{$del}';";
    sqlexec($query, null, true);
} elseif (isset($_GET['operation']) && $_GET['operation'] == "add") {
    $username = $_POST['user_username'];
    $full_name = $_POST['user_fullname'];
    $password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $type = (int)$_POST['user_type'];

    echo "username: {$_POST['user_username']}";
    echo "Full Name: {$_POST['user_fullname']}";
    echo "Password: {$password}";
    echo "type: {$_POST['user_type']}";

    try {
        sqlexec("INSERT INTO `pyover_users` (`username`, `full_name`, `password_hash`, `privileges`, `api_token`) VALUES ('{$username}', '{$full_name}', '{$password}', '{$type}', '{$password}');", null, true);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

} else {
    include("../templates/error.php");
    exit();
}


header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php?pane=settings&sub=um"); /* Redirect browser */