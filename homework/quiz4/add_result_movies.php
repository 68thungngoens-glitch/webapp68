<?php
    include 'connectdb_Flim.php';

    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $director = $_POST['director_movies'];
    $release_year = $_POST['date_movies'];
    $time = $_POST['hour_time_movies'];
    $score = $_POST['score_movies'];
    
    $sql = "INSERT INTO tb_movies(movie_name,movie_director,movie_year,movie_time,moive_score)
            VALUES ('$name','$director','$release_year','$time','$score');";
    mysqli_query($link,$sql);

    $movie_id = mysqli_insert_id($link);

    foreach ($type as $type_id){
        $sql = "INSERT INTO tb_movies_type(movies_id,type_id)
                VALUES ('$movie_id','$type_id');";
        mysqli_query($link,$sql);
    }
    echo "Movie added successfully.";
?>