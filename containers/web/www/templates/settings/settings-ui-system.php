<?php

if (isset($_GET['upgrade'])){
    shell_exec('cd /var/www/ && sudo ./auto-update.sh');
}

?>

<div class="container">

</div>
