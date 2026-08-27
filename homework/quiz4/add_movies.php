<html>
    <form name="add_movies" action="add_result_movies.php" method="POST">
     Movies :
<br>    Name <input type="text" name="name_movies" value="">
<br>    Type:
        <input type="checkbox" name="type[]" value="1">Action
        <input type="checkbox" name="type[]" value="2">Comedy
        <input type="checkbox" name="type[]" value="3">Drama
        <input type="checkbox" name="type[]" value="4">Horror
        <input type="checkbox" name="type[]" value="5">Sci-Fi
        <input type="checkbox" name="type[]" value="6">Romance
        <input type="checkbox" name="type[]" value="7">Adventure
        <input type="checkbox" name="type[]" value="8">Documentary
<br>    Director : <input type="text" name="director_movies" value="">
<br>    Release year : <input type="date" name="date_movies" value="">
<br>    Time : <input type="number" name="hour_time_movies"value="00" min="0" max="23">ชั่วโมง<input type="number" name="minute_time_movies" value="00" min="0" max="59">นาที
<br>    Score : <input type="number" name="score_movies" value ="0" min="1" max="10">คะแนน
<br>    <input type="submit" formaction ="movies.php" name="retrun_movies" value="Retrun">
        <input type="submit" name= "add_movies" value="Add">
    </form>
</html>