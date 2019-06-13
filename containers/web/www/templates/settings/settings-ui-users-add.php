<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 05/02/2019
 * Time: 12:54
 */
?>
<script src="../../scripts/settings-ui-users.js"></script>
<button type="button" class="btn btn-primary btn-dark" data-toggle="modal" data-target="#useraddModal" >Add User</button>
<div class="modal fade" id="useraddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="useraddForm" action="../../lib/be_users.php?operation=add" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="user_username">

                        <label for="recipient-name" class="col-form-label">Full Name:</label>
                        <input type="text" class="form-control" name="user_fullname">

                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" name="user_password">

                        <label for="recipient-name" class="col-form-label">User Type</label>
                        <select class="custom-select" name="user_type">
                            <option selected>Choose account type ...</option>
                            <option value="0">Viewer</option>
                            <option value="1">Admin</option>
                            <option value="2">API</option>
                        </select>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="useraddForm" id="user-create-submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>