<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 13/08/2018
 * Time: 22:31
 */
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

function sqlexec($q, $num=null, $no_output=false)
{
    $servername = "pyoverview_db_1";
    $username = "root";
    $password = "root";
    $dbname = "pycom_dashboard";


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($q);

    if ($no_output == false) {

        while ($row = $result->fetch_array()) {
            $rows[] = $row;
        }
        $result->close();
        if (isset($num)) {
            return $rows[$num];
        } else {
            return $rows;
        }
    }else {
        return "Success!";
    }
}