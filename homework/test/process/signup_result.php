<?php
    include '../config/connectdb_test.php' ;
//เช็ค name และ password
    if(empty($_POST['signup_name'])){
        echo "Not name";
        header("refresh:1;url=../signup.php");
        exit();
    }else if(empty($_POST['signup_password'])){
        echo "Not password";
        header("refresh:1;url=../signup.php");
        exit();
    }

    //เก็บค่าลงตัวแปร
    $name = $_POST['signup_name'];
    $password = $_POST['signup_password'];

    //เช็คว่าชื่อซ้ำ
    $sql = "SELECT * FROM member 
            WHERE member_name = '$name';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)>0){
        echo "This name already exists.";
        header("refresh:1;url=../signup.php");
    }else{
    //บันทึกลง datddase
    $sql = "INSERT INTO member (member_name,member_password) 
            VALUES ('$name','$password');";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Saved successfully";
        header ("refresh:1;url=../login.php");
    }
    }

    
?>