<?php
    include 'connectdb_Flim.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_movies WHERE movie_id='$id'";

    mysqli_query($link,$sql);

    $sql = "DELETE FROM tb_movies_type WHERE movies_id='$id'";

    mysqli_query($link,$sql);

    echo "Delete Success";
    header('refresh:1;url=movies.php');
?>