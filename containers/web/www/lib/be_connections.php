<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 23/11/2018
 * Time: 12:33
 */

include_once("sqlQuery.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}
?>

<html
><title>
</title>
<body>
<div id="ap_ssid"></div>


</body>

</html>
