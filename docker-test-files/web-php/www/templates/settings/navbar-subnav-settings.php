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
        <a class="nav-link active" href="<?php echo "$actual_link?pane=dashboard&sub=main";?>">Dashboard</a>
        <a class="nav-link" href="<?php echo "$actual_link?pane=dashboard&sub=devices";?>">
            Devices
            <span class="badge badge-pill bg-light align-text-bottom"><?php echo count($device_list);?></span>
        </a>
        <a class="nav-link" href="<?php echo "$actual_link?pane=dashboard&sub=reports";?>">Reports</a>
    </nav>
</div>
