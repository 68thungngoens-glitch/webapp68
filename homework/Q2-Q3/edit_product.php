<?php
include 'connectdb.php';

$x= $_GET['id'];

$sql= "SELECT *,product_price * product_amount AS product_total FROM tb_product WHERE product_id= '$x';";
$result= mysqli_query($link,$sql);

$y= mysqli_num_rows($result);

if(empty($y)){
    echo "USER NOT FOUND" ;
}else{
    $arr= mysqli_fetch_array($result);
?>
<form name= "frm_edit" method= "POST" action= "edit_result_product.php"> 
Product old : <br>
    Name : <?php echo $arr['product_name'];?>
    : Price : <?php echo $arr['product_price'];?>
    : Amount : <?php echo $arr['product_amount'];?>
    : Total : <?php echo $arr['product_total'];?>
<br>Product new : <br>
Name  : <input type= "text" name= 'product_name' value= "">
Price : <input type= "number" name= 'product_price' value=""> 
Amount : <input type= "number" name= 'product_amount' value="">
<input type= 'hidden' name= 'id' value= '<?php echo $arr['product_id'];?>'>
<br><br><input type= 'reset' name= "reset" value= 'reset'> 
<input type= 'submit' name= 'submit' value= 'save'> 
 
</form> 

<?php
}
?>