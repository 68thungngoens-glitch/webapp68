    <?php 
        session_start();
    include 'connectdb_midterm.php';

    echo $_SESSION['name'];
    $sql = "SELECT * FROM tb_student";
    $result = mysqli_query($link,$sql);
    
    ?>
<html>
    <table border = 1>
        <tr>
            <td>ID</td>
            <td>Student</td>

        </tr>
        <?php while($data = mysqli_fetch_array($result))
            {
                ?>
        <tr>
            <td><?php echo $data['student_id']?></td>
            <td><a href = "list.php?id=<?php echo $data['student_id']?>"><?php echo $data['student_name']?></a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</html>