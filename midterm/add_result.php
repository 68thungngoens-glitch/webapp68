<?php
    session_start();
    include 'connectdb_midterm.php';

    $name = $_POST['name'];
    $date = $_POST['dete'];
    $hour = $_POST['hour'];
    $point = $hour*2;

    $sql = "INSERT INTO tb_acivite(acivite_name,acivite_date,acivite_hour,acivite_point)
            VALUE ('$name','$date','$hour','$point')";
    $result = mysqli_query($link,$sql);

    $data = mysqli_insert_id($link);
    $student_id = $_SESSTON['id'];

    $sql = "INSERT INTO tb_student_acivite(student_id,acivite_id)
            VALUE ('$student_id','$acivite_id');";
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Add complete";
    }
?>