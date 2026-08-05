<?php
include 'connect.php';

$member_name = $_POST['member_name'];
$member_email = $_POST['member_email'];
$member_phone = $_POST['member_phone'];

if($member_name == "" || $member_email == "" || $member_phone == ""){

    echo "กรุณากรอกข้อมูลให้ครบ";
    header("refresh:1; url=register.php");
}else{$sql="INSERT INTO tb_member(member_name,member_email,member_phone)
VALUES ('$member_name','$member_email','$member_phone');";
$result = mysqli_query($link,$sql);
if($result){
    echo "complete";
    header("refresh:1; url=show.php");

}else{
    echo "fail";
    } 

}

?>
