<?php
    include 'connectdb.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM tb_member 
            WHERE member_name='$username';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) <= 0){
        $sql = "INSERT INTO tb_member(member_name,member_password,member_fullname,member_email)
                VALUES('$username','$password','$fullname','$email');";
        mysqli_query($link,$sql);


        $member_id = mysqli_insert_id($link);
        $sql = "INSERT INTO tb_wallet(member_id)
                VALUES ('$member_id');";
        mysqli_query($link,$sql);
        $sql = "INSERT INTO tb_point(member_id)
                VALUES ('$member_id');";
        mysqli_query($link,$sql);
        echo "Sign Up complete.";
        header("refresh:1;url='login.php'");
    }else{
        echo "Username already exists. ";
        header("refresh:1;url='signup.php'");
    }

?>