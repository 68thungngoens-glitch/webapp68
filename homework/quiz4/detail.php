<?php
    include 'connectdb_Flim.php';

    $x = $_GET['id'];

    $sql = "SELECT m.movie_id,m.movie_name,
            GROUP_CONCAT(t.type_name) AS movie_type,
            m.movie_director,
            m.movie_year,
            TIME_FORMAT(m.movie_time, '%H:%I') AS movie_time,
            m.movie_score
            FROM tb_movies m 
            JOIN tb_movies_type mt ON m.movie_id = mt.movies_id
            JOIN tb_type t ON mt.type_id = t.type_id
            WHERE m.movie_id = '$x'
            GROUP BY m.movie_id;";

    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_array($result);

    echo "ID : ".$data['movie_id'];
    echo "<br>MOVIE : ".$data['movie_name'];
    echo "<br>TYPE : ".$data['movie_type'];
    echo "<br>Director : ".$data['movie_director'];
    echo "<br>Release Year : ".$data['movie_year'];
    echo "<br>Time : ".$data['movie_time']." : H";
    echo "<br>Score : ".$data['movie_score'];
?>