<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 23/11/2018
 * Time: 12:33
 */

include_once("sqlQuery.php");


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
        case "timestamp":
            echo time();
            break;
        default:
            echo "Use operation argument to get info";
            break;
    }
}

?>

