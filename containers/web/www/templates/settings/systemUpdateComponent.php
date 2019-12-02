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
                                <td id="app_version">Unknown</td>
                            </tr>
                            <tr>
                                <td>Active Branch:</td>
                                <td id="branch_info">Unknown</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                <label for="branchSelect">Select Branch</label>
                <select class="form-control" id="branchSelect">
                    <option>Stable</option>
                    <option>Testing</option>
                </select>
                    <div>
                    <button class="btn btn-danger btn-block" id="updateButton">Start Update !</button>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <script>
                window.setInterval(function(){
                    $('#app_version').load('ajax/systeminfo.php?type=getVersion');
                    $('#branch_info').load('ajax/systeminfo.php?type=getBranch');
                }, 1000);
            </script>
        </div>
    </div>
</div>
