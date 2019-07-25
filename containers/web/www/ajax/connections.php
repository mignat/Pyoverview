<?php

function getserviceStatus($service)
{
    $x = shell_exec("sudo systemctl status $service | grep \"Active:\"");
    if ($x != "") {
        return substr($x, 11);
    }else{
        return "Error / Not Found";
    }
}

if (isset($_GET['type'])) {
    switch ($_GET['type']) {

        case "wifi":
            $status = getserviceStatus("hostapd");
            echo "$status";
            break;
        case "vpn":
            $status = getserviceStatus("openvpn");
            echo "$status";
            break;

        default:
            echo "Use type argument to get info";
            break;
    }
}else{

}