<?php
    session_start();

    if(isset($_SESSION['member_id'])){
        echo "you logined.";
        header("refresh:1;url=pages/list.php");
        exit();
    }
?>
<html>
    LOGIN :  
    <form action="process/login_result.php" method= "POST">
        Uesername : <input type="text" name="username">
    <br>Password : <input type ="password" name="password">
    <br><a href = "signup.php" >Signup</a>
    <input type="submit" value="login">
    </form>
</html>