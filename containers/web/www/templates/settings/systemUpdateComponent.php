<?php
?>
<button type="button" class="btn btn-primary btn-dark" data-toggle="modal" data-target="#systemUpdateModal" >System Update</button>

<!-- The SystemUpdate Dialog -->
<div class="modal fade" id="systemUpdateModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">System Update</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div>
                        <table class="table table-sm" style="padding-bottom: 50px">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>

                                <td>App Version:</td>
                                <td><?php echo shell_exec("git rev-parse HEAD"); ?></td>
                            </tr>
                            <tr>
                                <td>Current Branch:</td>
                                <td><?php echo shell_exec("git rev-parse --abbrev-ref HEAD"); ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                <label for="branchSelect">Select Branch</label>
                <select class="form-control" id="branchSelect">
                    <option>Stable</option>
                    <option>Testing</option>
                </select>
                    <button class="btn btn-danger btn-block" id="updateButton">Start Update !</button>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
