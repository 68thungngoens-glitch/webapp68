<?php
session_start();
if(!isset($_SESSION['name_id'])){
    echo "you not login.";
    header('refresh:1 ;url=Login.php');
    exit();
}
?>