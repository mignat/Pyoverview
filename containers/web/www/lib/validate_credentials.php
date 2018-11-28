<?php
    // session_start();
    //echo $_SESSION['user_id'];
    ///require_once("sqlQuery.php");

   /// $x = sqlexec("select * from pyover_users");
   // echo $x["password_hash"];
   /// echo "<h1> test </h1>";



echo password_hash("tibi123", PASSWORD_DEFAULT);


print_r(scandir(session_save_path()));