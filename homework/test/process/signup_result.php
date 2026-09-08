<?php
//เช็ค name และ password
    if(empty($_POST['signup_name'])){
        echo "Not name";
        header("refresh:1;url=../signup.php");
    }else if(empty($_POST['signup_password'])){
        echo "Not password";
        header("refresh:1;url=../signup.php");
    }

    //เก็บค่าลงตัวแปร
    $name = $_POST['signup_name'];
    $password = $_POST['signup_password'];

    
?>