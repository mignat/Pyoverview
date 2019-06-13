<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 13/08/2018
 * Time: 16:15
 */
session_start();
require_once('sqlQuery.php');


$login_username = $_POST["username"];
$login_password = $_POST["password"];
$db_hash = sqlexec("SELECT * FROM `pyover_users` WHERE username=\"$login_username\"",0);

if (password_verify($login_password, $db_hash["password_hash"])) {
    echo 'Password is valid !';
    $_SESSION['user_id'] = $login_username;
    $_SESSION['full_name'] = $db_hash["full_name"];
    $_SESSION['permissions'] = $db_hash['privileges'];
    header("Location: http://$_SERVER[HTTP_HOST]/PyDashboard.php"); /* Redirect browser */
    echo "PRIV: {$_SESSION['permissions']}";
    exit();
} else {
    #echo 'Invalid password.';
    header("Location: http://$_SERVER[HTTP_HOST]/lib/login.php?fail=1"); /* Redirect browser */
    #echo $db_hash;
}
