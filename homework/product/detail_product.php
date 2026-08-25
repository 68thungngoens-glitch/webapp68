<?php
include "connectdb.php";

$x= $_GET['id'];
$sql= "SELECT* , product_price * product_amount AS product_total
        FROM tb_product WHERE product_id='$x';";
$result= mysqli_query($link,$sql);

$y= mysqli_num_rows($result);

if(empty($y)){
    echo "UESR NOT FOUND" ;
}else{
$arr= mysqli_fetch_array($result);
    echo "ID: ".$arr["product_id"]."</br>"; 
    echo "NAME: ".$arr["product_name"]."</br>"; 
    echo "PRICE: ".$arr["product_price"]."</br>";
    echo "AMOUNT: ".$arr["product_amount"]."</br>";
    echo "TOTAL: ".$arr["product_total"]."</br>";
}
?>   