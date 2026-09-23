<?php
   if(empty($username = $_POST['username'])){
        echo "user not fail";
       header("refresh:1;url='sign_up.php'");
       exit();
   }elseif(empty($password = $_POST['password'])){
        echo "password not fail";
        header("refresh:1;url='sign_up.php'");
        exit();
   }elseif(empty($name = $_POST['name'])){
        echo "name not fail";
        header("refresh:1;url='sign_up.php'");
        exit();
   }

   include 'connectdb_wallet.php' ;

        $sql = "SELECT * FROM tb_member 
            WHERE member_username = '$username';";
        $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) <= 0){
        $sql = "INSERT INTO tb_member (member_username,member_password,member_name)
            VALUES ('$username','$password','$name');";
        $result = mysqli_query($link,$sql);
        echo "Save complete";
    }else{
        echo "Don't save ";
    }
?>