<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 14/08/2018
 * Time: 18:18
 */

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/login.php"); /* Redirect browser */
    exit();
}
require_once('sqlQuery.php');
$station = $_GET['station'];
$connector = sqlexec("SELECT * FROM `pyover_devices` where \"name\"=\"$station\"", 0);
?>

<html>
<head>
    <title><?php echo "EDITING STATION: {$_GET['station']}"; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4"></div>
</div>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4 page_content">
        <div class="container">
            <div class="col-4 page_banner"> <?php echo "<div>EDITING STATION: {$_GET['station']}</div>"; ?>
                <?php echo "<div class='user-info'>Current USER: {$_SESSION['user_id']}</div>"; ?> </div>
            <div><a class="button" href="test.php"> Back </a></div>

        </div>
    </div>
    <div class="col-4">
    </div>


</div>
</body>
</html>
