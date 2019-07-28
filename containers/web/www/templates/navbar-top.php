<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 15:26
 */
?>
<script>

    function ajaxUpgrade() {
        $.ajax({
            type: "GET",
            url: "../../templates/settings/setting-ui-system.php",
            data: "upgrade=1",
        });



</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo "$actual_link?pane=dashboard&sub=main";?>">
        <img src="../images/logobot.svg" width="60" height="60" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link <?php if ($_GET['pane'] == 'dashboard'){ echo 'disabled';} ?>" href="<?php echo "$actual_link?pane=dashboard&sub=main";?>">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Advanced
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo "$actual_link?pane=settings&sub=ap";?>">Wifi AP Settings</a>
                    <a class="dropdown-item" href="<?php echo "$actual_link?pane=settings&sub=um";?>">User Management</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo "$actual_link?pane=settings&sub=db";?>">Database Management</a>
                    <a class="dropdown-item" href="<?php echo "$actual_link?pane=settings&sub=system";?>">System Management</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="../images/user.png" width="32" height="32" alt="">
                        <?php echo $_SESSION['full_name'];?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item">Admin:<?php echo $_SESSION['permissions']; ?></a>
                        <a class="dropdown-item" href="#">Profile</a>
                        <button class="dropdown-item" onclick="ajaxUpgrade()">Upgrad++++++</button>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../lib/logout.php">Logout</a>
                    </div>
                </li>

            </ul>
        </form>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

