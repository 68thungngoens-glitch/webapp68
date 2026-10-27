<?php
    session_start();
    include 'connectdb_midterm.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_student 
            WHERE username='$username'";
    $result = mysqli_query($link,$sql);
        if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_array($result);
            if($data['password']==$password){
            echo "login complte";
            $_SESSION['id'] = $data['student_id'];
            $_SESSION['name']=$data['student_name'];
            header("refresh:1;url=show.php");
            }else{
            echo "password fail";
            header("refresh:1;url=login.php");
        }
        
    }else{
        echo "username fail";
        header("refresh:1;url=login.php");
    }

?>