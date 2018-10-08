<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 10:32
 */
session_start();
session_destroy();
header("Location: http://$_SERVER[HTTP_HOST]/lib/login.php"); /* Redirect browser */
