<?php
    include "connectdb_Flim.php";

    $sql = "SELECT m.movie_id,
            m.movie_name,
            GROUP_CONCAT(t.type_name) AS movie_type,
            m.movie_director,m.movie_year,
            m.movie_time,
            m.moive_score 
            FROM tb_movies m
            JOIN tb_movies_type mt ON m.movie_id = mt.movies_id
            JOIN tb_type t ON mt.type_id = t.type_id
            GROUP BY m.movie_id";

    $result= mysqli_query($link,$sql);
    ?>
<html>
    <table border = "1">
        <tr>
            <td>Id</td>
            <td>Movies_name</td>
            <td>Movies_type</td>
            <td>Movie_director</td>
            <td>Movie_year</td>
            <td>Movie_time</td>
            <td>Movies_score</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
    </table>
 
    <br>
    <a href = add_movies.php>Add : </a>
    <a href = edit_movies.php> Edit : </a>
    <a href = delete_movies.php> Delete</a>
</html>