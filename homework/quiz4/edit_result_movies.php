<?php
    session_start();
    if(!isset($_SESSION['name_id'])){
        echo "you not login.";
        header('refresh:1;url=Login.php');
        exit();
    }else{
    echo $_SESSION['name']."Edit<br>";    
    include 'connectdb_Flim.php';

    $id = $_POST['id'];
    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $director = $_POST['director_movies'];
    $release_year = $_POST['date_movies'];
    $hours = $_POST['hour_time_movies'];
    $minutes = $_POST['minute_time_movies'];
    $score = $_POST['score_movies'];

    $time = sprintf('%02d:%02d:00',$hours,$minutes);

    $sql = "UPDATE tb_movies SET movie_name = '$name',
            movie_director = '$director',
            movie_year='$release_year',
            movie_time = '$time',
            movie_score='$score' 
            WHERE movie_id = '$id';";

    mysqli_query($link,$sql);

    $sql = "DELETE FROM tb_movies_type WHERE movies_id = '$id'";

    mysqli_query($link,$sql);

    foreach($type as $type_id){
        $sql = "INSERT INTO tb_movies_type(movies_id,type_id)
                VALUES ('$id','$type_id')";
        
        mysqli_query($link,$sql);
    }

    echo "Edit Success";
    header('refresh:1;url=movies.php');
    }
    


?>