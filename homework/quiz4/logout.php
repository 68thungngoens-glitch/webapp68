<?php
    session_start();
    
    session_destroy();
    echo "Logout Complete";
    echo "<a href='Login.php'>Login</a>"
?>