<?php
/**
 * Created by PhpStorm.
 * User: mariusignat
 * Date: 12/09/2018
 * Time: 17:37
 */

require "../../lib/table_creator.php";


$test = new table_creator("SELECT * FROM `pyover_users`");
$test->run_query();
?>
<h1>TEST </h1>
