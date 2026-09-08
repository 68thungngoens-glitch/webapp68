<?php
    include 'connectdb_Flim.php';
    $name = $_POST['sign_up_name'];
    $password = $_POST['sign_up_password'];

    $check = "SELECT * FROM tb_name 
                WHERE name = '$name';";
    $result = mysqli_query($link,$check);
    if(mysqli_num_rows($result) > 0){
        echo "Duplicate name";
        header("refresh:1;url = SignUp.php");
      }else{
        $sql = "INSERT INTO tb_name(name,password)
                VALUES ('$name','$password');";
        $result = mysqli_query($link,$sql);
         if($result){

        
        echo "Saved successfully.";
        header("refresh:1;url=Login.php");
             }else{
        echo "Save failed.";

      }
        
    }

?>

    