<?php
    include "../config/connectdb_test.php";

    session_start();
    $id = $_GET['id'];
    $member_id = $_SESSION['member_id'];
    $sql = "SELECT * FROM tb_movies WHERE member_id='$id' AND member_id='$member_id';";
    $result = mysqli_query($link,$sql);
    if(mysqli_num_rows($result)>0){
    $sql = "SELECT m.movies_id,m.movies_name,
            GROUP_CONCAT(t.type_name) AS movies_type,
            m.movies_director,m.movies_release_year,
            TIME_FORMAT(m.movies_time, '%H:%i') AS movies_time,
            m.movies_point
            FROM tb_movies m
            JOIN tb_movies_type mt ON m.movies_id = mt.movies_id
            JOIN tb_type t ON mt.type_id = t.type_id
            WHERE m.movies_id = '$id'
            GROUP BY movies_id;";
    $result = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($result);
    echo " ID : ".$arr['movies_id'];
    echo "<br> Name : ".$arr['movies_name'];
    echo "<br> Type : ".$arr['movies_type'];
    echo "<br> Director : ".$arr['movies_director'];
    echo "<br> Release_year : ".$arr['movies_release_year'];
    echo "<br> Time : ".$arr['movies_time']." :H";
    echo "<br> Point : ".$arr['movies_point'];

    $_SESSION['movies'] = $arr['movies_name'];
    $_SESSION['action'] = "detail";

    echo "<br><a href='show_movies.php'>Back : </a>";
    echo "<br><a href='add_movies.php'>Add : </a><a href='edit_movies.php'> Edit </a>";
    echo "<br><a href='delete.php'> Delete :</a>";
    }else{
        echo "user don't doit";
        header("refresh:1;url=show_movies.php");
        exit();
    }
?>
