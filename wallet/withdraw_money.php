<?php   
    session_start();
    include 'connectdb.php';

    $id = $_SESSION['id'];
    $sql = "SELECT money FROM tb_wallet WHERE member_id='$id';";
    $result = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($result);    
?>
<html><form action='withdraw_money_result.php' method='POST'>
    You want withdraw money : <input type='number' name='money' min= 1 max= <?php echo $arr['money'];?> value='1'> .$ 
<br><a href='show_wallet.php'>Back</a>
    <input type = 'submit' value='next'>
</html>