<?php
include "connectdb.php";

$x= $_GET['id'];

$sql= "DELETE FROM tb_product WHERE product_id= '$x';";
$result= mysqli_query($link,$sql);
if($result){
    echo "DELETE COMPLETE" ;
}else{
    echo "DELETE FAIL";
}
echo "<a href='product_show.php'> BACK TO SHOW </a>";
?>