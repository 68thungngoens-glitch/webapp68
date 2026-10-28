<?php 
        session_start();
    if(!isset($_SESSION['name_id'])){
        echo "you not login.";
        header('refresh:1;url=Login.php');
        exit();
    }else{
    include 'connectdb_Flim.php';
    $id = $_GET['id'];

    $sql = "SELECT m.movie_id,
            m.movie_name,
            GROUP_CONCAT(t.type_name) AS movie_type,
            m.movie_director,
            m.movie_year,
            TIME_FORMAT(m.movie_time, '%H:%I') AS movie_time,
            m.movie_score
            FROM tb_movies m
            JOIN tb_movies_type mt ON m.movie_id = mt.movies_id
            JOIN tb_type t ON mt.type_id = t.type_id
            WHERE m.movie_id = '$id'
            GROUP BY m.movie_id;";

    $result = mysqli_query($link,$sql);

    $data = mysqli_fetch_assoc($result);
    echo $_SESSION['name']."Editing : <br>"; }
?>
<html>
        Movies : 
    <br> ID : <?php echo $data['movie_id'];?>
    <br> Old : 
    <br> Name : <?php echo $data['movie_name'];?>
    <br> Type : <?php echo $data['movie_type'];?>
    <br> Director : <?php echo $data['movie_director'];?>
    <br> Release year : <?php echo $data['movie_year'];?>
    <br> Time : <?php echo $data['movie_time']." : H : M";?>
    <br> Score : <?php echo $data['movie_score'];?>
    <br> <form name= 'edit_movies' action='edit_result_movies.php' method='POST'>
            New : 
    <br>    Name: <input type="text" name='name_movies' value=''>
    <br>    Type:
            <input type='checkbox' name='type[]' value='1'>Action
            <input type='checkbox' name='type[]' value='2'>Comedy
            <input type='checkbox' name='type[]' value='3'>Drama
            <input type='checkbox' name='type[]' value='4'>Horror
            <input type='checkbox' name='type[]' value='5'>Sci-Fi
            <input type='checkbox' name='type[]' value='6'>Romance
            <input type='checkbox' name='type[]' value='7'>Adventure
            <input type='checkbox' name='type[]' value='8'>Documentary
    <br>    Director: <input type='text' name='director_movies' value=''>
    <br>    Release year: <input type='date' name='date_movies' value=''>
    <br>    Time:   <input type='number' name='hour_time_movies' value='0' min='0' max='24'>: H 
                    <input type='number' name='minute_time_movies' value='0' min='0' max='59'> : M
    <br>    Score: <input type='number' name='score_movies' value=''min='1'max='10'>MAX.10
    <br>    <input type='submit' formation ="movies.php" name='retrun_movies' value='Retrun'>
            <input type='reset' name='reset' value='Reset'>
            <input type='submit' name='edit_movies' value='Edit'>
            <input type='hidden' name='id' value='<?php echo $data['movie_id'];?>'>
        </form>
</html>