<?php
    include 'check_login.php';
    include 'connectdb_Flim.php';

    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $director = $_POST['director_movies'];
    $release_year = $_POST['date_movies'];
    $hours = $_POST['hour_time_movies'];
    $minutes = $_POST['minute_time_movies'];
    $score = $_POST['score_movies'];

    $time = sprintf("%02d:%02d:00",$hours,$minutes);
    
    $sql = "SELECT * FROM tb_movies WHERE movie_name ='$name';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result) > 0){
        echo "Failed to add because the name already exists.";
        header("refresh:1;url=add_movies.php");
    }else{
    $sql = "INSERT INTO tb_movies(movie_name,movie_director,movie_year,movie_time,movie_score)
            VALUES ('$name','$director','$release_year','$time','$score');";

    mysqli_query($link,$sql);
    
    $movie_id = mysqli_insert_id($link);

    foreach ($type as $type_id){
        $sql = "INSERT INTO tb_movies_type(movies_id,type_id)
                VALUES ('$movie_id','$type_id');";
        mysqli_query($link,$sql);
    }
    echo "Movie added successfully.";
    header("refresh:1;url=movies.php");
    }
?>