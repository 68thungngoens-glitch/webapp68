<?php
session_start();
    include 'connect.php';

    $username = $_POST['member_username'];
    $password = $_POST['member_password'];

    $sql = "SELECT * FROM tb_member WHERE member_username='$username' AND member_password = '$password'";

    $result = mysqli_query($link,$sql);
    $row = mysqli_num_rows($result);
    if(empty($row)){
        echo "LOGIN FAIL";
        exit;
    }else{
        $sql = "SELECT member_id,member_name FROM tb_member WHERE member_username='$username';";
        $result = mysqli_query($link,$sql);
        $arr=mysqli_fetch_array($result);
        $_SESSION['member_id'] = $arr['member_id'];
        $_SESSION['member_name'] = $arr['member_name'];
        header("location: show.php");

    }
?>