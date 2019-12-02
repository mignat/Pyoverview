<?php

if (isset($_GET['upgrade'])){
    shell_exec('cd /var/www/ && sudo ./auto-update.sh');
}

?>

<div class="container">
<p>test</p>
<?php include ("systemUpdateComponent.php"); ?>

</div>
