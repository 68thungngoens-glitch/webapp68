<?php
    include "connectdb_Flim.php";

    $sql = "SELECT m.movie_id,
            m.movie_name,
            GROUP_CONCAT(t.type_name) AS movie_type,
            m.movie_director,
            m.movie_year,
            TIME_FORMAT(m.movie_time, '%H:%i') AS movie_time,
            m.movie_score 
            FROM tb_movies m
            JOIN tb_movies_type mt ON m.movie_id = mt.movies_id
            JOIN tb_type t ON mt.type_id = t.type_id
            GROUP BY m.movie_id";

    $result= mysqli_query($link,$sql);
    ?>
<html>
    <table border = "1">
        <tr>
            <td>ID</td>
            <td>Movies_name</td>
            <td>Movies_type</td>
            <td>Movie_director</td>
            <td>Movie_year</td>
            <td>Movie_time</td>
            <td>Movies_score</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        while($data = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $data['movie_id'];?></td>
            <td><?php echo $data['movie_name'];?></td>
            <td><?php echo $data['movie_type'];?></td>
            <td><?php echo $data['movie_director'];?></td>
            <td><?php echo $data['movie_year'];?></td>
            <td><?php echo $data['movie_time'];
                        echo " : H";
                        ?>
            </td>
            <td><?php echo $data['movie_score'];?></td>
            <td><a href="edit_movies.php?id=<?php echo $data['movie_id'];?>">Edit</a></td>
            <td><a href="delete_movies.php?id=<?php echo $data['movie_id'];?>">Delete</a></td>
        
        </tr>
        <?php
        }
        ?>
    </table>
 
    <br>
    <a href = add_movies.php>Add : </a>
</html>