<?php
    session_start();
    $_SESSION['action'] = "Add"; 
?>
<html>
    ADD_MOVIES : <?php echo $_SESSION["member_name"]." : ".$_SESSION['action'];?><form action="../process/add_result_movies.php" method='POST'>
<br>Name : <input type="text" name="name_movies">
<br>Type : 
<input type="checkbox" name="type[]" value="1">action
<input type="checkbox" name="type[]" value="2">comedy
<input type="checkbox" name="type[]" value="3">horror
<br>Director : <input type = "text" name="director_movies">
<br>Release Year : <input type="date" name="date_movies">
<br>Time : <input type='number' name="time"> Minute.
<br>Point : <input type="number" name="point" max="10"> MAX 10 .
<br><input type='reset' value='Reset'>
    <input type='submit' value="Add">
</html>