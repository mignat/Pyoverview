<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 05/02/2019
 * Time: 12:54
 */
if ($_SESSION['privileges'] != 1) {
    #include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
include_once ("../../lib/sqlQuery.php")
$query = sqlexec("SELECT * FROM `pyover_devices` where name = '${$_SESSION['']}'")
?>
<script src="../../scripts/settings-ui-users.js"></script>
<button type="button" class="btn btn-primary btn-dark" data-toggle="modal" data-target="#viewDeviceModal" >View</button>

<div class="modal fade" id="viewDeviceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="useraddForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                        <label for="recipient-name" class="col-form-label">User Type</label>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose account type ...</option>
                            <option value="1">Viewer</option>
                            <option value="2">Admin</option>
                            <option value="3">API</option>
                        </select>
                    </div>
                    <div class="form-group">

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="user-create-submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>