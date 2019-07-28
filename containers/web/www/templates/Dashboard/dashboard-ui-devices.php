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
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>
<table class="table table-hover align-content-center" align="center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">NO</th>
        <th scope="col">STATION</th>
        <th scope="col">STATUS</th>
        <th scope="col">LAST CONTACT</th>
        <th scope="col">OPTIONS</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($device_list as $row) {
        $directory = getcwd();
        $file = "/var/www/html/templates/Dashboard/dashboard-ui-modal-creator.php";
        $view = eval(file_get_contents($file));
        echo "<tr scope=\"row\">
							<td>{$no}</td>
							<td>{$row['name']}</td>
							<td>{$row['status']}</td>
							<td>{$row['last_contact']}</td>
							<td class='device_options'>
							<div class='btn-group'>
							    <div>{$view}</div>
							    <div><a class='btn btn-primary btn-sm' href=\"editStation.php?station={$row['name']}\">Edit</a></div>
							    <div><button type=\"button\" class=\"btn btn-danger btn-sm\" data-container=\"body\" data-toggle=\"popover\" data-trigger=\"focus\" data-placement=\"right\" data-html=\"true\" title=\"<b>Are you sure ?</b>\" data-content=\"<div><a class='btn btn-danger btn-sm btn-block' href='/lib/be_devices.php?delete={$row['name']}'>Confirm</button></div>\">Remove</button></div>
							    </div>
                            </td>
						</tr>";
        $no++;
    } ?>
    </tbody>
    <tfoot>
    <tr>
    </tr>
    </tfoot>
</table>
    </div>
</div>
