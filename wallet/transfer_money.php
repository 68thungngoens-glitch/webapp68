<?php   
    $id_in = $_GET['id'];
?>

<html><form action='transfer_result_money_result.php' method='POST'>
    How much : <input type='number' name='money' min= 1 max=5000> .$
    <input type='hidden' name='id_in'value='<?php echo $id_in;?>'>
<br><a href='show_wallet.php'>Back</a>
    <input type = 'submit' value='next'>
</html>