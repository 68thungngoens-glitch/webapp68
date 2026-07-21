<html>
<form name="frm-register" action="result.php" method="POST">
NAME: <input type="text" name="member_name"><br>
TEL: <input type="text" name="member_tel"><br>
E-mail: <input type="email" name="member_mail"><br>
username: <input type="text" name="member_username"><br>
password: <input type="password" name="member_password"><br>
Gender:
    <input type="radio" name="member_gender" value="1">male
    <input type="radio" name="member_gender" value="2">feemale<br>
MAJOR:
    <select name = "mrmber_major">
        <option value= "1">Computer science </option>
        <option value= "2">Information Technology </option>
        <option value= "3">Multimedia Technology</option>
    </select>
    <br>
<input type="submit" name="submit" value="ok">
<input type="reset" name="reset" value="Cancel">
</form>
</html>
