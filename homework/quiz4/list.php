<?php
    session_start();
    if(isset($_SESSION)){
        echo $_SESSION['name']." Edit<br>" ; 
    }else{
        exit();
    }
?>
<html>
    <a href = movies.php > movies</a>
</html>