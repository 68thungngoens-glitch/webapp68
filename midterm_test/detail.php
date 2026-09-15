<?php
    include 'connectdb_cs_db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_event WHERE student_id='$id';";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_array($result);

    echo "ID : ".$data['student_id']."<br>";
    echo "Name : ".$data['student_name']."<br>";
    echo "Activity : ".$data['student_activity']."<br>";
    echo "Date : ".$data['student_date']."<br>";
    echo "Hour : ".$data['student_hour']."<br>";
    echo "Point : ".$data['student_point']."<br>";
?>
<html>
    <a href='show_event.php'>Back</a>
</html>