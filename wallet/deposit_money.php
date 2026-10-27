<?php   
    $point = $_GET['point'];
?>
<html><form action='deposit_money_result.php' method='POST'>
    You want deposit money : <input type='number' name='money' min= 1 max=5000> .$ MAX 5000
<br>YOU HAVE POINT : <?php echo $point  ;?>
<br>Can you ues 1000 point = 1$ <input type = 'checkbox' name='ues' value='1' > UES
<br><input type = 'hidden' name = 'point' value='<?php echo $point?>'>
<br><a href='show_wallet.php'>Back</a>
    <input type = 'submit' value='next'>
</form>
</html>