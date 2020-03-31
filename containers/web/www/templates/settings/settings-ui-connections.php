<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:30
 */
include ('connectionElement/connectionComponent.php');

if ($_SESSION['permissions'] != 1) {
    $error_type = "Access_denied";
    include ("templates/error.php");
    #header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
include("settings-ui-modal-wifi.php");
include("settings-ui-modal-vpn.php");
?>

<script>

    window.setInterval(function(){
        $('#ap_status').load('../../ajax/connections.php?type=wifiService');
        $('#ap_ip').load('../../ajax/connections.php?type=wifiIP');
    }, 1000);

</script>

<div class="container">
    <?php
    $con = new connectionComponent("WIFI","../../ajax/connections.php?type=wifiService","hostapd");
    $con->render();
    ?>
    <?php
    $con = new connectionComponent("VPN","../../ajax/connections.php?type=wifiService","openvpn");
    $con->render();
    ?>

    </div>
