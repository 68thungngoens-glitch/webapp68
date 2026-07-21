<?php 
    include 'connectdb.php';
 $sql = "SELECT * FROM tb_product";
 $result = mysqli_query($link,$sql);
?>
<html>
    <table border="1">
        <tr>
            <td> ID </td>
            <td> product_name </td> 
            <td> price </td>           
        </tr>
    <?php
    while($arr = mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $arr["product_id"];?></td>
        <td><?php echo $arr["product_name"];?></td>
        <td><?php echo $arr["product_price"];?></td>
    <?php
    }
    ?>
    </table>
</html>