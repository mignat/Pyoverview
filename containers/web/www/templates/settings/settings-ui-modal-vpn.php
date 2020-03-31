<?php
if ($_SESSION['permissions'] != 1) {
#include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
?>
<div class="modal fade" id="ModalVpn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="Form" action="../../lib/be_connections.php?operation=vpn_update" method="post">
                    <div class="form-group">
                        <label for="ap_name">VPN Server</label>
                        <input type="text" class="form-control" id="vpn_server"  placeholder="VPN Server">
                        <label for="exampleInputFile">Certificate</label>
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="Form" id="vpn-submit" class="btn btn-primary">Save & Apply</button>
            </div>
        </div>
    </div>
</div>