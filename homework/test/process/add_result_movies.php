<?php
    include '../config/connectdb_test.php';

    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $dir = $_POST['director_movies'];
    $ryear = $_POST['date_movies'];
    $time = $_POST['time'];
    $point = $_POST['point'];

    foreach($type AS $type_id)
    echo $type_id."<br>";
?>