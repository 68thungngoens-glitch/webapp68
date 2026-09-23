<?php
    session_start();
    if(!isset($_SESSION['id'])){
        echo "you not login";
        header("refresh:1;url='login.php'");
        exit();
    }
?>