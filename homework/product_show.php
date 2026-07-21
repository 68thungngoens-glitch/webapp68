<?php
include 'connectdb.php';

$sql = "SELECT *,
        product_price * product_amount AS total_price
        FROM tb_product";

$result = mysqli_query($link,$sql);
?>

<html>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Total Price</th>
    </tr>

<?php
while($arr = mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $arr["product_id"]; ?></td>
    <td><?php echo $arr["product_name"]; ?></td>
    <td><?php echo $arr["product_price"]; ?></td>
    <td><?php echo $arr["product_amount"]; ?></td>
    <td><?php echo $arr["total_price"]; ?></td>
</tr>
<?php
}
?>
</table>
</html>