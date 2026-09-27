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

<br><a href='add_money.php'> Add Money :</a>
</html>