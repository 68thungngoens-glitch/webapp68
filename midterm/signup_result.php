<?php
    include 'connectdb_midterm.php';
    $name = $_POST['name_student'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tb_student(student_name,username,password)
            VALUES ('$name','$username','$password');";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Signup complete";
        header("refresh:1;url=login.php");
    }
?>