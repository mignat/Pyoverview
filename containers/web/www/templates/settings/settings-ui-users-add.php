<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 05/02/2019
 * Time: 12:54
 */
?>
<script src="../../scripts/settings-ui-users.js"></script>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#useraddModal" >Add User</button>

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
                <form id="useraddForm">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password:</label>
                        <input class="text" class="form-control" id="password_input" name="password"></input>
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