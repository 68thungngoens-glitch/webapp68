<?php
    session_start();
    include 'connectdb_midterm.php';
    echo $_SESSION['name'];
    $id = $_GET['id'];
?>
<html>
    <table border = 1 >
        <tr>
            <td>ID</td>
            <td>Acivite</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </table>
<a href='add.php'>Add : Acivite</a>
</html>