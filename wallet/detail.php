<?php
    session_start();
    include 'connectdb.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_member 
            WHERE member_id='$id';";
   $result = mysqli_query($link,$sql);
   $arr = mysqli_fetch_array($result);
    echo "ID :".$arr['member_id']."<br>";
    echo "Name :".$arr['member_fullname']."<br>";
    echo "Email :".$arr['member_email']."<br>";
    echo "Role :".$arr['member_role']."<br>";
?>
<html>
    <a href='show_wallet.php'>Back</a>
</html>