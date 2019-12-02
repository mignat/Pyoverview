<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 08/10/2018
 * Time: 03:12
 */
require("../lib/sqlQuery.php");
function get_server_memory_usage()
{
    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2] / $mem[1] * 100;
    return intval($memory_usage);
}

function get_server_cpu_usage()
{
    $load = sys_getloadavg();
    return $load[0] * 100;

}

function device_num(){

    $query = sqlexec("select count(*) from pyover_devices");
    return $query[0][0];

}

function systemUpdate($branch){
    $execution = shell_exec("git pull && git checkout $branch");
    return $execution;
}

switch ($_GET['type']) {

    case "cpu":
        $procent = get_server_cpu_usage();
        echo "$procent %";
        break;
    case "ram":
        $procent = get_server_memory_usage();
        echo "$procent %";
        break;
    case "device_num":
        echo device_num();
        break;
    case "systemUpdate":
        if (!isset($_GET["branch"])){
            echo "Please specify \"branch\" parameter";
        } else {
            echo systemUpdate($_GET["branch"]);
        }
        break;

    default:
        echo "Use type argument to get info";
        break;
}