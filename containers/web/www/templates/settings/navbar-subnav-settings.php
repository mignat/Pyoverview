<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 16:50
 */
?>

<div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline">
        <a class="nav-link active" href="<?php echo "$actual_link?pane=settings&sub=ap";?>">Wifi AP</a>
        <a class="nav-link" href="<?php echo "$actual_link?pane=settings&sub=db";?>">Database</a>
        <a class="nav-link" href="<?php echo "$actual_link?pane=settings&sub=um";?>">User Management</a>
        <div class="nav-link" style="max-width: 100%"></div>
        <a class="nav-link" href="#"
           target="popup"
           onclick="window.open('../../lib/webconsole.php','popup','width=600,height=600'); return false;">
            Terminal
        </a>

    </nav>
</div>
