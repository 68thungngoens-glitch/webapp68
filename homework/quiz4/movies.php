<?php
    include 'check_login.php';
    echo $_SESSION['name']." : seeing <br>";
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
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php
        while($data = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $data['movie_id'];?></td>
            <td><a href="detail.php?id=<?php echo $data['movie_id'];?>"><?php echo $data['movie_name'];?></a></td>
            <td><a href="edit_movies.php?id=<?php echo $data['movie_id'];?>">Edit</a></td>
            <td><a href="delete_movies.php?id=<?php echo $data['movie_id'];?>">Delete</a></td>
        
        </tr>
        <?php
        }
        ?>
    </table>
 
    <br>
    <a href = add_movies.php>Add : </a>
<br> <a href = logout.php>Logout : </a>
</html>