<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 06/09/2018
 * Time: 15:01
 *
 */


session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/lib/login.php"); /* Redirect browser */
    exit();
}

if (!isset($_GET['pane']) && !isset($_GET['sub'])){
    $_GET['pane'] = "dashboard";
    $_GET['sub'] = "main";
}
require_once("lib/sqlQuery.php");
$device_list = sqlexec("SELECT * FROM `pyover_devices`");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/PyDashboard.php";
$static_link = $actual_link;
?>

<!DOCTYPE html>
<html>
<head>
    <title>System Overview</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/costum.css">
    <script>element.autocomplete = isGoogleChrome() ? 'disabled' :  'off';</script>

</head>
<body>

<div class="jumbotron-fluid shadow-sm">

        <?php include("templates/navbar-top.php");

        if ($_GET['pane'] == "dashboard"){
            include("templates/Dashboard/navbar-subnav-dashboard.php");
        }
        if ($_GET['pane'] == "settings"){
            include("templates/settings/navbar-subnav-settings.php");
        }
        ?>
        <div class="container-fluid align-items-center content">
        <?php
        if ($_GET['pane'] == "dashboard"){
            if (isset($_GET['sub'])) {
                switch ($_GET['sub']) {

                    case "main":
                        echo "<h1 class='pagetitle'> Dashboard </h1><hr class='my-4'>";
                        include("templates/Dashboard/dashboard-ui-main.php");
                        break;

                    case "devices":
                        echo "<h1 class='pagetitle'> Devices </h1><hr class='my-4'>";
                        include("templates/Dashboard/dashboard-ui-devices.php");
                        break;

                    case "audit_log":
                        echo "<h1 class='pagetitle'> Audit </h1><hr class='my-4'>";
                        include("templates/Dashboard/dashboard-ui-audit.php");
                        break;

                    case "reports":
                        echo "<h1 class='pagetitle'> Reports </h1><hr class='my-4'>";
                        include("templates/Dashboard/dashboard-ui-reports.php");
                        break;

                    default:
                        include("templates/error.php");
                        break;


                }
            } else {
                include ("templates/error.php");
            }
        }
        if ($_GET['pane'] == "settings") {
            if (isset($_GET['sub'])) {
                switch ($_GET['sub']) {

                    case "ap":
                        echo "<h1 class='pagetitle'> Connections </h1><hr class='my-4'>";
                        include("templates/settings/settings-ui-wifi.php");
                        break;

                    case "db":
                        echo "<h1 class='pagetitle'> Database Settings </h1><hr class='my-4'>";
                        include("templates/settings/settings-ui-database.php");
                        break;

                    case "um":
                        echo "<h1 class='pagetitle'> User Management </h1><hr class='my-4'>";
                        include("templates/settings/settings-ui-users.php");
                        break;

                    case "test":
                        echo "<h1 class='pagetitle'> User Management TEST </h1><hr class='my-4'>";
                        include("templates/settings/settings-ui-users-add.php");
                        break;
                    default:
                        include("templates/error.php");
                        break;


                }
            } else {
                include ("templates/error.php");
            }
        }
        ?>
    </div>
    <?php include("templates/footer.php"); ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>