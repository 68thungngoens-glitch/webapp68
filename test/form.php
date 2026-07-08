<html>
    <form name="frm-register" action="result.php" method="POST">
        NAME: <input type="text" name="member_name"> <br>
        TEL: <input type="text" name="member_tel"><br>
        E-mail: <input type="email" name="member_email"><br>
        username: <input type="text" name="member_user"><br>
        password: <input type="password" name="member_pass"><br>
        gender:
         <input type="radio" name="member_gender" value="1">male
         <input type="radio" name="member_gender" value="2">feemale<br>
        major:
         <select name="member_major">
            <option value= "1">Computer science</option>
            <option value="2">Information Technology </option>
            <option value="3">Multimedia Technology</option>
         </select><br>
<input type="submit" name="submit" value="Ok">
<input type="reset" name="reset" value="Cancel">
</form>
</html>