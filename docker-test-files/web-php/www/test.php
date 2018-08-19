<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: http://$_SERVER[HTTP_HOST]/login.php"); /* Redirect browser */
    exit();
}
require_once("sqlQuery.php");
$connector = sqlexec("SELECT * FROM `pyover_devices`");

?>
<html>
	<head>
		<title>System Overview</title>
		<link rel="stylesheet" href="styles2.css">
	</head>
	<body>
			<div class="container overview">
                <div class="banner"
				<span>System Overview </span>
                <span class='user-info'>Current USER: <?php echo $_SESSION['user_id']; ?></span>
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
						foreach ($connector as $row)
                        {
                            echo "<tr>
							<td>{$no}</td>
							<td>{$row['name']}</td>
							<td>{$row['status']}</td>
							<td>{$row['last_contact']}</td>
							<td>
							    <div><a href=\"editStation.php?station={$row['name']}\">Edit</a></div>
							    <div><a href=\"removeStation.php?station={$row['name']}\">Remove</a></div>
                            </td>
						</tr>";
						$no++;
						}?>
					</tbody>
					<tfoot>
					<tr>
					</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
