<?php

if (isset($_GET['api_token'])){
    echo "TO-DO";
}else {
    include_once('../security/security-policy.php');
}

if (isset($_GET['operation'])) {
    switch ($_GET['operation']) {

        case 'reboot':
            exec()



    }
}