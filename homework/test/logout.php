<?php
    session_start();

    session_destroy();
    echo "logout comple";
    header("refresh:1;url=login.php");
?>