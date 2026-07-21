<?php
$host= "localhost";
$username= "root";
$password= "";
$dbname= "cs_db";
$link= mysqli_connect($host,$username,$password,$dbname) or die("connect fail");

$member_name = $_POST['member_name'];
$member_email = $_POST['member_email'];
$member_phone = $_POST['member_phone'];

$sql="INSERT INTO tb_member(member_name,member_email,member_phone)
VALUES ('$member_name','$member_email','$member_phone');";
$result = mysqli_query($link,$sql);
if($result){
    echo "complete";
}else{
    echo "fail";
}

?>