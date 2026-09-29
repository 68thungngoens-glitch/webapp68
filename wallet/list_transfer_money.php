<?php   
    session_start();
    include 'connectdb.php';

    $id = $_SESSION['id'] ;

    $sql = "SELECT * FROM tb_member 
            WHERE member_id != '$id';";
    $result = mysqli_query($link,$sql);
?>
<html>
    <table border='1'>
        <tr><td>ID</td>
            <td>Name</td>
        </tr>
        <?php   while($arr = mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $arr['member_id'];?></td>
            <td><a href='transfer_money.php?id=<?php echo $arr['member_id'];?>'><?php echo $arr['member_fullname'];?></a></td>
        </tr>
        <?php }?>
    </table>
</html>