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
function getAdaptorIP($interafce){
    $x = shell_exec("ip addr show $interafce | awk '$1 == \"inet\" {gsub(/\/.*$/, \"\", $2); print $2}'");
    return $x;
}

if (isset($_GET['type'])) {
    switch ($_GET['type']) {

        case "wifiService":
            $status = getserviceStatus("hostapd");
            echo "$status";
            $ip = getAdaptorIP("wlan0");
            echo "$ip";
            break;
        case "vpn":
            $status = getserviceStatus("openvpn");
            echo "$status";
            break;
        case "wifiIP":
            $ip = getAdaptorIP("wlan0");
            echo "$ip";
            break;

        default:
            echo "Use type argument to get info";
            break;
    }
}else{

}