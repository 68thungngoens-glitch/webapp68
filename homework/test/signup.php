<?php
    session_start();
    if(empty($_SESSION['member_id'])){
        echo "you doing loin.";
        header("refresh:1;url=pages/list.php");
        exit();
    }
?>
<html>
    SIGN_UP : <br>
    <form action="process/signup_result.php" method="POST">
    Name : <input type="text" name="signup_name" >
<br>Password : <input type="password" name="signup_password">
<br><a href="login.php">back</a>
    <input type="submit" value="sign_up">
</form>
</html>