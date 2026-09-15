<?php
    include 'connectdb_cs_db.php';

    $sql = "SELECT * FROM tb_event ;";
    $result = mysqli_query($link,$sql);
    
?>

<html>
    student : <br>
    <table border = '1'>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php while($data = mysqli_fetch_array($result)){?>
        <tr>
            <td><?php echo $data['student_id'];?></td>
            <td><?php echo "<a href='detail.php?id=".$data['student_id']."'>".$data['student_name']."</a>";?></td>
            <td><?php echo "<a href='edit.php?id=".$data['student_id']."'>"."Edit"."</a>";?></td>
            <td><?php echo "<a href='delete.php?id=".$data['student_id']."'>"."Delete"."</a>";?></td>
            
        </tr>
        <?php 
        }
        ?>
    </table>
<a href="add_student.php">Add : </a>
</html>