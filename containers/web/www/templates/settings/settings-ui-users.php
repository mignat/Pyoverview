<?php

?>
<div class="container">
<table class="table table-hover align-content-center" align="center">
    <thead class="thead-dark">
    <tr>
        <th scope="col">NO</th>
        <th scope="col">USERNAME</th>
        <th scope="col">STATUS</th>
        <th scope="col">LAST CONTACT</th>
        <th scope="col">OPTIONS</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($user_list as $row) {
        echo "<tr scope=\"row\">
							<td>{$no}</td>
							<td>{$row['name']}</td>
							<td>{$row['status']}</td>
							<td>{$row['last_contact']}</td>
							<td class='user_options'>
							<div class='btn-group' role='group'>
							    <div><a class='btn btn-primary btn-sm' href=\"viewStation.php.station={$row['name']}\">View</a> </div>
							    <div><a class='btn btn-primary btn-sm' href=\"editStation.php?station={$row['name']}\">Edit</a></div>
							    <div><button type=\"button\" class=\"btn btn-danger btn-sm\" data-container=\"body\" data-toggle=\"popover\" data-trigger=\"focus\" data-placement=\"right\" data-html=\"true\" title=\"<b>Are you sure ?</b>\" data-content=\"<div><button class='btn btn-danger btn-sm btn-block' onClick='' type='button'>Confirm</button></div>\">Remove</button></div>
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