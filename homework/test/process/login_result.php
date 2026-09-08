<?php
    //เช็ค username และ password
    if(empty($_POST['username'])){
        echo "NOT FAIL Username";
        header ("refresh:1 ;url=../login.php");
    }else if(empty($_POST['password'])){
        echo "NOT FAIL Password";
        header ("refresh:1;url=../login.php"); 
    }

    //เก็บค่าลงตัวแปร
    $username = $_POST['username'];
    $password = $_POST['password'];
?>