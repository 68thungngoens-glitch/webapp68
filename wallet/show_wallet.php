<?php
    include 'chack_login.php';
    echo "Name : ".$_SESSION['name']."<br>Role : ".$_SESSION['role'];
    if($_SESSION['role']=='admin'){
?>
<html>
    <table border = '1'>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>List</td>
            <td>Time</td>
        </tr>
    </table>
</html>
<?php   }else{?>
<html>
<br>Do you want ? :
<a href='add_money.php'>add money : </a>
</html>
<?php } ?>
<html>
<br><a href='log_out.php'>Log_out</a>
</html>