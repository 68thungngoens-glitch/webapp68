<?php
include 'connect.php';

$x = $_GET['id'];

$sql = "SELECT * FROM tb_member WHERE member_id = '$x';";
$result = mysqli_query($link,$sql);

$y = mysqli_num_rows($result);
if(empty($y)){
    echo "USER NOT FOUND" ;
}else{
$arr = mysqli_fetch_array($result);
?>
<form name="frm_edit" method="POST" action="edit_result.php">
        NAME :  <input type="text" name="member_name" value="<?php echo $arr["member_name"];?>"><br>
        E-MAIL : <input type="text" name="member_email" value ="<?php echo $arr["member_email"];?>"><br>
        PHONE : <input type="text" name="member_phone">
        <input type="hidden" name="id" value="<?php echo $arr["member_id"];?>">
        <br><br><input type="submit" name="submit" value="SAVE">
            <input type="reset" name="reset" value="CANCEL"> 
    </form>
<?php
}
?>