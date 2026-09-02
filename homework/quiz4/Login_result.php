<?php 
    session_start();
    include "connectdb_Flim.php";
    $name = $_POST['name_peple'];
    $password = $_POST['name_password'];

    $sql = "SELECT * FROM tb_name 
            WHERE name = '$name';";
    
    $result = mysqli_query($link,$sql);

    if (mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        if ($password == $data["password"]){
            echo "Login successful.";
            $sql = "SELECT id_name,name FROM tb_name WHERE name = '$name';";
            $result = mysqli_query($link,$sql);
            $arr = mysqli_fetch_array($result);
            $_SESSION['name_id'] = $arr['id_name'];
            $_SESSION['name'] = $arr['name'];
            header("refresh:1;url = list.php");
            }else{
            echo "Incorrect password. ";
            header("refresh:1;url = Login.php");
        }
    }else{
            echo "User not found.";
            header("refresh:1;url = Login.php");
    }
?>