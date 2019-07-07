<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 08/10/2018
 * Time: 03:12
 */
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

switch ($_GET['type']) {

    case "cpu":
        $procent = get_server_cpu_usage();
        echo "$procent %";
        break;
    case "ram":
        $procent = get_server_memory_usage();
        echo "$procent %";
        break;

    default:
        echo "Use type argument to get info";
        break;
}