<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 23/11/2018
 * Time: 12:33
 */

include_once("sqlQuery.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}

function serviceOPS($operation,$service)
{
    $x = shell_exec("sudo systemctl $operation $service");
}

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {

        case "restart":
            $service = $_GET['service'];
            $exec = serviceOPS("restart", $service);
            break;
        case "stop":
            $service = $_GET['service'];
            $exec = serviceOPS("stop", $service);
            break;
        case "start":
            $service = $_GET['service'];
            $exec = serviceOPS("start", $service);
            break;

        default:
            echo "Use type argument to get info";
            break;
    }
}

?>

