<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:30
 */
if ($_SESSION['permissions'] != 1) {
    $error_type = "Access_denied";
    include ("templates/error.php");
    #header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
?>
<script>

    window.setInterval(function(){
        $('#ap_status').load('../../ajax/connections.php?type=wifiService');
        $('#ap_ip').load('../../ajax/connections.php?type=wifiIP');
        $('#tunnel_status').load('../../ajax/connections.php?type=tunnelService');
        $('#tunnel_host').load('../../ajax/connections.php?type=tunnelHost');
    }, 5000);

</script>

<div class="container">
    <div class="container jumbotron">
        <h3> AP Settings </h3>
        <hr class='my-4'>
        <table class="table table-borderless">
            <tbody>
            <tr scope="row">
                <td style="max-width: 0px">Status:</td>
                <td id="ap_status"></td>
                <td></td>
            </tr>
            <tr>
                <td>IP:</td>
                <td id="ap_ip"></td>
            </tr>
            </tbody>
        </table>
        <?php
        include("settings-ui-connections-wifi.php")
        ?>
    </div>
    <div class="container jumbotron">
        <h3> DB Tunnel Settings </h3>
        <span>Status:</span><span id="tunnel_status"> </span><span>        </span>
        <span>IP:</span><span id="tunnel_host"></span>
        <hr class='my-4'>
        <?php
        include("settings-ui-connections-vpn.php")
        ?>
    </div>
</div>
