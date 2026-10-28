<?php
include 'connectdb.php';

$x = $_POST['id'];
$name= $_POST['product_name'];
$price= $_POST['product_price'];
$amount= $_POST['product_amount'];

$sql = "UPDATE tb_product SET product_name= '$name',product_price= '$price',product_amount= '$amount' WHERE product_id= '$x';";
$result= mysqli_query($link,$sql);
if($result){
    echo "EDIT COMPLETE";
}else{
    echo "EDIT FAIL";
}
echo "<a href='product_show.php'> BACK TO SHOW</a>";
?>