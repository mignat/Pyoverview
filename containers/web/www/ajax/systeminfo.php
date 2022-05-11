<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 08/10/2018
 * Time: 03:12
 */
require("../lib/sqlQuery.php");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
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

function systemUpdate($branch)
{
    $desired_branch = $branch;
    $execution = shell_exec("cd /opt/Pyoverview/ && sudo git pull && sudo git checkout $branch 2>&1");
    return $execution;
}
switch ($_GET['type']) {

    case "cpu":
        $procent = get_server_cpu_usage();
        echo "$procent %";
        break;

    case "getVersion":
        echo shell_exec("cd /opt/Pyoverview/ && git rev-parse HEAD");
        break;

    case "getBranch":
        echo shell_exec("cd /opt/Pyoverview/ && git rev-parse --abbrev-ref HEAD");
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
           $exec =  systemUpdate($_GET["branch"]);
           if (isset($exec)) {
               $output = explode(PHP_EOL, $exec);
               foreach ($output as $line) {
                   echo "<p>$line</p>";
               }
           }

        }
        break;

    default:
        echo "Use type argument to get info";
        break;
}
