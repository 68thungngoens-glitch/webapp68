<?php
    session_start();
    include '../config/connectdb_test.php';
    //เช็ค username และ password
    if(empty($_POST['username'])){
        echo "NOT FAIL Username";
        header ("refresh:1 ;url=../login.php");
        exit();
    }else if(empty($_POST['password'])){
        echo "NOT FAIL Password";
        header ("refresh:1;url=../login.php"); 
        exit();
    }

    //เก็บค่าลงตัวแปร
    $username = $_POST['username'];
    $password = $_POST['password'];


    
    $sql = "SELECT * FROM member WHERE member_name = '$username';";
    $result= mysqli_query($link,$sql);
    //เช็ค ชื่อ
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_array($result);
        //เช็ค password
        if($password == $data['member_password']){
            echo "Login successful.";
            //เพิ่ม SESSION 
            $_SESSION['member_id'] = $data['member_id'];
            $_SESSION['member_name']=$data['member_name'];
            header("refresh:1;url=../pages/list.php");

        }else{
            echo "Incorrect password ";
            header("refresh:1;url=../login.php");
        }
    }else{
        echo "This name is not in the system.";
        header("refresh:1;url=../login.php");
    }
?>