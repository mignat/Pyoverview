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
    $error_type = "Unknown Error";
}

switch($error_type) {
    case "SQL_Error":
        $message = "Database related error !";
        break;
    case "PHP_Error":
        $message = "PHP Code error, possible BUG !";
        break;
    default:
        $message = "Lazy coding !";
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
        <?php echo $error_type; ?>
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

