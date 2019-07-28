<?php
/**
 * Created by PhpStorm.
 * User: Dark
 * Date: 7/28/2019
 * Time: 4:04 PM
 */

if (isset($_GET['device'])){
    $device = $_GET['device'];
    echo 'Device: ', $device;
}