<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:30
 */
if ($_SESSION['permissions'] != 1) {
    #include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
?>


<div class="container">
        <div class="container">
        <form>
            <h3> AP Settings </h3>
            <span>Status:</span><span id="ap_status">%Running%</span><span>  </span>
            <span>IP:</span><span id="ap_ip"></span>
            <hr class='my-4'>
            <div class="form-group">
                <label for="ap_name">SSID</label>
                <input type="text" class="form-control" id="ap_name"  placeholder="AP Name">
                <label for="ap_pass">Password</label>
                <input type="password" class="form-control" id="ap_pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Save & Apply</button>
        </form>
        <form autocomplete="off">
            <h3> VPN Settings </h3>
            <hr class='my-4'>
            <div class="form-group">
                <label for="ap_name">VPN Server</label>
                <input type="text" class="form-control" id="vpn_server"  placeholder="VPN Server">
                <label for="ap_name">VPN User</label>
                <input type="text" class="form-control" id="vpn_username" placeholder="VPN Username">
                <label for="ap_pass">VPN Password</label>
                <input type="password" class="form-control" id="vpn_pass" placeholder="Password">
                <label for="exampleInputFile">Certificate</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            </div>

            <button type="submit" class="btn btn-primary">Save & Apply</button>
        </form>
    </div>
</div>
