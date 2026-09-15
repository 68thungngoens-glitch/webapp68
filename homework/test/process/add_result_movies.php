<?php
<<<<<<< HEAD
    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $dir = $_POST['director_movies'];
    $year = $_POST['dete_movies'];
    $time = $_POST['time'];
    $point = $_POST['point'];

    $sql = "SELECT * FROM " 
=======
    include '../config/connectdb_test.php';

    $name = $_POST['name_movies'];
    $type = $_POST['type'];
    $dir = $_POST['director_movies'];
    $ryear = $_POST['date_movies'];
    $time = $_POST['time'];
    $point = $_POST['point'];

    foreach($type AS $type_id)
    echo $type_id."<br>";
>>>>>>> cd5ff31324a37b36b36b64d6d00b38a3d8c0dfec
?>