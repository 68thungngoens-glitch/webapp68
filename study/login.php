<?php
    session_start();

    if(isset($_SESSION['member_id'])){
        echo "your Loined.";
        exit();
    }
?>
<html>
    <form name="form-login" method="POST" action="check_loin.php">
        USERNAME: <input type="text" name="member_username"><br>
        PASSWORD: <input type="password" name="member_password">
        <input type="submit" value="Login">
    </form>
</html>