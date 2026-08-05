<?php
    include 'connect.php';

    $x = $_GET['id'];
    $sql = "DELETE FROM tb_member WHERE member_id = '$x';";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "DELETE COMPLETE" ; 
    }else{
        echo "DELETE FAIL" ; 
    }
    echo "<a href='show.php'>BACK TO SHOW</a>";
?>