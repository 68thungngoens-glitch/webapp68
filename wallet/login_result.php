<?php
    session_start();
    include "connectdb.php";

    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_member
            WHERE member_name = '$username' 
            AND member_password = '$password';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) > 0){
    $arr = mysqli_fetch_array($result);
        echo "Login ing >>>";
        $_SESSION['id'] = $arr['member_id'];
        $_SESSION['name'] = $arr['member_fullname'];
        header("refresh:1;url=show_wallet.php");
    }else{
        echo "User and password not connect";
        header("refresh:1;url=login.php");
    }


?>