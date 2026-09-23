<?php
    session_start();
     if(empty($username = $_POST['username'])){
        echo "user not fail";
       header("refresh:1;url='login.php'");
       exit();
   }elseif(empty($password = $_POST['password'])){
        echo "password not fail";
        header("refresh:1;url='login.php'");
        exit();
   }
    
    include 'connectdb_wallet.php' ;

    $sql = "SELECT * FROM tb_member 
            WHERE member_username = '$username'AND member_password = '$password';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)){
        echo "login complete";

        $arr = mysqli_fetch_array($result);
        $_SESSION['name'] = $arr['member_name'];
        $_SESSION['id'] = $arr['member_id'];
        $_SESSION['role'] = $arr['role'];

        header("refresh:1;url='show_wallet.php'");
    }else{
        echo "fail";
        header("refresh:1;url='login.php'");
    }
?>