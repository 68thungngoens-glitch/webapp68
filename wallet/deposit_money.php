<?php   
session_start();

    include 'connectdb.php';
    $id = $_SESSION['id'];


    $sql = "SELECT point_balance FROM tb_wallet 
        WHERE member_id = '$id'";
    $result = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($result);
?>
<html><form action='deposit_money_result.php' method='POST'>
    You want deposit money : <input type='number' name='money' min= 1 max=5000> .$ MAX 5000
<br>YOU HAVE POINT : <?php echo $arr["point_balance"]  ;?>
<br>Can you ues 1000 point = 1$ <input type = 'checkbox' name='ues' value='1' > UES
<br><a href='show_wallet.php'>Back</a>
    <input type = 'submit' value='next'>
</form>
</html>