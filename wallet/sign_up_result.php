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
        echo "password not fail";
        header("refresh:1;url='sign_up.php'");
        exit();
   }

    echo $username." : ".$password;
?>