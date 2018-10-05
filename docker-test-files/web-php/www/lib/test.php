<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php"); /* Redirect browser */
    exit();
}
require_once("sqlQuery.php");
$connector = sqlexec("SELECT * FROM `pyover_devices`");

?>
<html>
<head>
    <title>System Overview</title>
    <link rel="stylesheet" href="styles/styles2.css">
</head>
<body>
<div class="container">

    <div class="sidenav">
        <h4 class="banner">Navigation</h4>
        <div><a class="sidenav-button" href="test.php">Overview</a></div>
        <div><a class="sidenav-button" href="wifi-config.php">Wifi AP Settings</a></div>
        <div><a class="sidenav-button" href="power-settings.php">System Settings</a></div>

    </div>

    <div class="main-colum">
        <h4 class="banner">Overview</h4>
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
    </div>
</div>
</body>
</html>
