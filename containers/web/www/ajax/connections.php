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
    return shell_exec("ip addr show $interafce | awk '$1 == \"inet\" {gsub(/\/.*$/, \"\", $2); print $2}'");
}
function getTunnelHost($service){
    return shell_exec("sudo service ssh_tunnel status |grep -io \"ubuntu@.*\"");
}


if (isset($_GET['type'])) {
    switch ($_GET['type']) {

        case "wifiService":
            echo getserviceStatus("hostapd");
            break;
        case "tunnelService":
            echo getserviceStatus("ssh_tunnel");
            break;
        case "tunnelHost":
            echo getTunnelHost("ssh_tunnel");
            break;
        case "wifiIP":
            echo getAdaptorIP("wlan1");
            break;

        default:
            echo "Use type argument to get info";
            break;
    }
}else{

}