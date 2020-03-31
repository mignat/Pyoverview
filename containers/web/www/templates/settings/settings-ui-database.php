<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:30
 */
if ($_SESSION['permissions'] != 1) {
    include("../error.php?errortype=Access_denied");
//    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
if (file_exists("/isdocker")) {
    echo "Docker";
    include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Inside_Docker"); /* Redirect browser */
    exit();
} else {
    echo "<iframe frameborder=\"0\" id=\"monitoring_frame\"";
    echo "src=\"http://$_SERVER[HTTP_HOST]/phpmyadmin/index.php\"></iframe>";
}

