<?php
    session_start();
    if(empty($_SESSION['member_id'])){
        echo "you not login.";
        header("refresh:1;url=../login.php");
        exit();
    }else{
            echo "Name : ".$_SESSION['member_name'];
    }
?>
<html><br>
    list : 
<br>1. <a href="show_movies.php">movies</a>
    <a></a>
<br><a href="../logout.php">log out</a>
</html>