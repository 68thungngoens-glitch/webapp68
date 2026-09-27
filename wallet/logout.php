<?php
    session_start();

    session_destroy();
    echo "you log out complete.";
    header("refresh:1;url='login.php'");
?>