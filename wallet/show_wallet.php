<?php
    include 'chack_login.php';
    echo "Name : ".$_SESSION['name']."<br>Role : ".$_SESSION['role'];
    if($_SESSION['role']=='admin'){
?>
<html>
    <table border = '1'>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>List</td>
            <td>Time</td>
        </tr>
    </table>
    
</html>
<?php   }else{?>
<html>

</html>
<?php } ?>
<html>
<br><a href='log_out.php'>Log_out</a>
</html>