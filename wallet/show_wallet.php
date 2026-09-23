<?php
    include 'chack_login.php';
    session_start();

    echo "Name : ".$_SESSION['name'];
?>
<html>
     
<br><a href='log_out.php'>Log_out</a>

</html>