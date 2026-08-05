<?php
include 'connect.php';

$x = $_GET['id'];

$sql = "SELECT * FROM tb_member WHERE member_id = '$x';";
$result = mysqli_query($link,$sql);

$y = mysqli_num_rows($result);
if(empty($y)){
    echo "USER NOT FOUND" ;
}else{
$arr = mysqli_fetch_array($result);

echo "ID: ".$arr["member_id"]."</br>";
echo "NAME: ".$arr["member_name"]."</br>";
echo "EMAIL: ".$arr["member_email"]."</br>";
echo "Number_Phone: ".$arr["member_phone"]."</br>";
}
?>