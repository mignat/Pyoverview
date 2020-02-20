<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 24/09/2018
 * Time: 15:24
 */
if (isset($_GET['errortype'])) {
    $error_type = $_GET['errortype'];
    }else{
    $error_type = "Access_denied";
}

switch($error_type) {
    case "SQL_Error":
        $message = "Database related error !";
        break;
    case "PHP_Error":
        $message = "PHP Code error, possible BUG !";
        break;
    case "Access_denied":
        $message = "You lack the privileges to access this page !";
        break;
    case "Inside_Docker":
        $message = "This feature is not available inside the Docker testing environment";
        break;
    default:
        $message = "The page you are looking for ";
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title> <?php echo $error_type; ?></title>
</head>
<body>
<div class="container">
<div class="jumbotron">
    <h1>
        <img style="max-width: 32px;max-height: 32px;" class="small-img" src="../images/error.png"><?php echo $error_type; ?>
    </h1>
    <hr class="my-4">
    <p>
        <?php echo $message; ?>
    </p>
    <a class="btn btn-danger btn-block" href="../PyDashboard.php">Go Back</a>
</div>
</div>

</body>
</html>

