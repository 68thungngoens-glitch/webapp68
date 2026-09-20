<?php
    session_start();

    include '../config/connectdb_test.php';
    $member_id = $_SESSION['member_id'];
    $add = "1";
    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $dir = $_POST['director_movies'];
    $reyear = $_POST['date_movies'];
    $time = $_POST['time'];

    $hour = floor($time / 60);
    $min = $time % 60;
    $time = sprintf("%02d:%02d:00",$hour,$min);
    $point = $_POST['point'];

    $sql = "SELECT * FROM tb_movies WHERE movies_name = '$name';";
    $result = mysqli_query($link,$sql);

    if(mysqli_fetch_array($result)>0){
        echo "name movies you can don't insert";
        header("refresh:1;url=../pages/show_movies.php");
        exit();
    }else{
         $sql = "INSERT INTO tb_movies (movies_name,movies_director,movies_release_year,movies_time,movies_point,member_id)
            VALUES ('$name','$dir','$reyear','$time','$point','$member_id');";
    
    $result = mysqli_query($link,$sql);
    if($result){
        echo "Add complete";

        $movies_id = mysqli_insert_id($link);

        foreach($type as $type_id){
            $sql = "INSERT INTO tb_movies_type(movies_id,type_id)
                    VALUES ('$movies_id','$type_id');";
            mysqli_query($link,$sql);
        }
        header("refresh:1;url=../pages/show_movies.php");
    }
    }
?>