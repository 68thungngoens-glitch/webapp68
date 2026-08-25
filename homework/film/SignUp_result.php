<?php
    include 'connectdb_Flim.php';
    $name = $_POST['sign_up_name'];
    $password = $_POST['sign_up_password'];

    $sql = "INSERT INTO tb_name(name,password)
                VALUES ('$name','$password');";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Saved successfully.";
        header("refresh:1;url=Login.php");
    }else{
        echo "Save failed.";
    }
?>