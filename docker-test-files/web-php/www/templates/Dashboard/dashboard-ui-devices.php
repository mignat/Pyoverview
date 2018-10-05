<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 17:22
 */
?>

<table class="data-table" align="center">
    <thead>
    <tr>
        <th class="col0">NO</th>
        <th class="col1">STATION</th>
        <th class="col2">STATUS</th>
        <th class="col3">LAST CONTACT</th>
        <th class="col4">OPTIONS</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($connector as $row) {
        echo "<tr>
							<td>{$no}</td>
							<td>{$row['name']}</td>
							<td>{$row['status']}</td>
							<td>{$row['last_contact']}</td>
							<td class='device_options'>
							    <div><a class='cssBtn' href=\"viewStation.php.station={$row['name']}\">View</a> </div>
							    <div><a class='cssBtn' href=\"editStation.php?station={$row['name']}\">Edit</a></div>
							    <div><a class='cssBtn' href=\"removeStation.php?station={$row['name']}\">Remove</a></div>
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
