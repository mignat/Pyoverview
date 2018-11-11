<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>PyOverview Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/signin.css">

</head>
<body class="text-center">


    <form class="form-signin" _lpchecked="1" action="takelogin.php" method="post">
        <img class="mb-4" src="../images/logobot.svg" alt="" width="150" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <?php
        if ($_GET['fail'] == 1){
            echo "<p class=\"bg-danger border-danger\">Invalid username or password</p>";
        }
        ?>
        <input type="username" name="username" class="form-control" placeholder="Username" required="" autofocus="" autocomplete="off">
        <input type="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>