<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 17:22
 */

?>
<div class="container">
    <div class="container-fluid">
        <script src="../../scripts/dashboard-ui-devices.js"></script>
        <?php
        $table = new table_creator("SELECT `name` as `NAME`,`location` as `LOCATION`,`status` AS `STATUS` FROM `pyover_devices` WHERE 1", true);
        $table->run_query();
        $table->addOption("<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#viewModal\" data-device=\"%id%\">View</button>");
        $table->addOption("<button type=\"button\" class=\"btn btn-warning\">Edit</button>");
        $table->addOption("<button type=\"button\" class=\"btn btn-danger\" data-container=\"body\" data-toggle=\"popover\" data-trigger=\"focus\" data-placement=\"right\" data-html=\"true\" title=\"<b>Are you sure ?</b>\" data-content=\"<div><a class='btn btn-danger btn-sm btn-block' href='/lib/be_devices.php?delete=%id%'>Confirm</button></div>\">Remove</button>");
        $table->genTable();
        ?>
    </div>
</div>


<!-- The viewModal Dialog -->
<div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Station</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                ERROR : CANNOT RETRIEVE DATA
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>