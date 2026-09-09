<?php
    include "connectdb_cs_db.php";

    $name = $_POST['name_student'];
    $last = $_POST['last_name_student'];
    $activity = $_POST['activity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $point = $time*2;
    $full_name = $name." ".$last;
   $sql = "INSERT INTO tb_event(student_name,student_activity,student_date,student_hour,student_point)
             VALUES ('$full_name','$activity','$date','$time','$point');";

    $result = mysqli_query($link,$sql);

    if($result){
        echo "Saved successfully";
        header("refresh:1;url=show_event.php");
    }else{
        echo "Fail";
        header("refresh:1;url=add_student.php");
    }
        
    
?>