<?php
if ($_SESSION['permissions'] != 1) {
#include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
?>
<button type="button" class="btn btn-primary btn-dark" data-toggle="modal" data-target="#ModalWifi" >Settings</button>
<div class="modal fade" id="ModalWifi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Form" action="../../lib/be_connections.php?operation=wifi_update" method="post">
                        <div class="form-group">
                            <label for="ap_name">SSID</label>
                            <input type="text" class="form-control" id="ap_name"  placeholder="AP Name">
                            <label for="ap_pass">Password</label>
                            <input type="password" class="form-control" id="ap_pass" placeholder="Password">
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="Form" id="wifi-submit" class="btn btn-primary">Save & Apply</button>
            </div>
        </div>
    </div>
</div>
