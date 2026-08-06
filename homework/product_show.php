<?php
include 'connectdb.php';

$sql = "SELECT * FROM tb_product";

$result = mysqli_query($link,$sql);
?>

<html>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Edit</th>
        <th>Delete</th>
  
    </tr>

<?php
while($arr = mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $arr["product_id"]; ?></td>
    <td><?php echo "<a href= 'detail_product.php?id=".$arr['product_id']."'>".$arr["product_name"]."</a>"; ?></td>
    <td><a href="edit_product.php?id=<?php echo $arr['product_id'];?>">Edit</a></td>
    <td><a href= "delete_product.php?id=<?php echo $arr['product_id'];?>">Delete</a></td>
    <td><a></a></td>
</tr>
<?php
}
?>
</table>
</html>