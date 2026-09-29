<?php
    session_start();
    include 'connectdb.php';
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM tb_wallet 
            WHERE member_id='$id'";
    
    $result = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($result);
?>
<html>
    MY WALLET YOU : <?php echo $_SESSION['name'];?>
<br><?php   echo "Money : ".$arr['money']." $";?>
<br>List : 
<br><table border=1>
    <tr>
        <td>ID</td>
        <td>List</td>
        <td>Money</td>
        <td>Time</td>
    </tr>
</table>
<br><a href='deposit_money.php'> Deposit Money :</a>
<br><a href='logout.php'>Log Out :</a>
</html>