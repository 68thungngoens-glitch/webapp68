<?php
include 'connect.php';

$sql = "SELECT * FROM tb_member";
$result = mysqli_query($link,$sql);
?>
<html>
    <table border="1">
        <tr>
            <td> ID </td>
            <td> NAME </td>
            <td> EDIT </td>
            <td> DELETE </td>
        </tr>
        <?php
        while($arr = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $arr['member_id'];?></td>
            <td><?php echo "<a href = 'detail.php?id=".$arr['member_id']."'>".$arr['member_name']."</a>";?></td>
            <td><a href="edit.php?id=<?php echo $arr['member_id'];?>">EDIT</a></td>
            <td><a href="delete.php?id=<?php echo $arr["member_id"];?>">DELEETE</a></td>

        </tr>
        <?php
        }
        ?>
    </table>
</html>