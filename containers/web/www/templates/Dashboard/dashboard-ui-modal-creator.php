<?php

?>
<button type="button" class="btn btn-primary btn-dark" data-toggle="modal" data-target="#useraddModal">View</button>
<div class="modal fade" id="useraddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Device Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <script>

                    window.setInterval(function(){
                        $('#device_view').load('dashboard-ui-devices-view.php?device=<?php $row['name']; ?>);

                    }, 1000);

                </script>
                <div class="container-fluid" id="device_view"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="useraddForm" id="user-create-submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>



