<?php
    session_start();

    session_destroy();
    echo "LogOut Complete";
    echo "<a href='login.php'> Log In</a>";
?>