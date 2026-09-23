<html>
<?php
    session_start();
    session_destroy();
    echo "Logout complete";
    header("refresh:1;url='login.php'");
?>