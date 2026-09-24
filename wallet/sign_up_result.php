<?php   session_start();
    if(isset($_SESSION['id'])){
        echo "you loging";
        header("refresh:1;url=show_wallet.php");
        exit();
    }
?>
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
        $role = "member";
        $sql = "INSERT INTO tb_member (member_username,member_password,member_name,role)
            VALUES ('$username','$password','$name','$role');";
        $result = mysqli_query($link,$sql);
        echo "Save complete";
        header("refresh:1;url='login.php'");
    }else{
        echo "Don't save ";
        header("refresh:1;url='sign_up.php'");
    }
?>