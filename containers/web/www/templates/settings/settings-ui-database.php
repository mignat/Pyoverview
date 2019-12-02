<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:30
 */
if ($_SESSION['permissions'] != 1) {
    #include("../error.php?errortype=Access_denied");
    header("Location: http://$_SERVER[HTTP_HOST]/templates/error.php?errortype=Access_denied"); /* Redirect browser */
    exit();
}

?>


<div class="container-fluid" xmlns="http://www.w3.org/1999/html">


    <iframe frameborder="0" id="myadmin_frame" src="http://<?php echo $_SERVER[HTTP_HOST] ?>/phpmyadmin/index.php"</iframe> "


</div>
