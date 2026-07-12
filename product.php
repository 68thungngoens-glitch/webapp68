<html>
    <form name = "product_all" action ="product_result.php" method ="POST">
    pr
     Product Name : <input type= "text" name ="member_name"> 
     Price : <input type = "number" name ="member_price">
    <br><br><textarea name="member_description" placeholder = "enter description"></textarea>
    <br>Product Category 
    <br><input type="radio" name="member_category" value="1">อาหาร
        <input type="radio" name="member_category" value="2">เครื่องดื่ม
        <input type="radio" name="member_category" value="3">ขนม
        <input type="radio" name="member_category" value="4">ของใช้
        <input type="radio" name="member_category" value="">อื่นๆ
    <br><br>
    <input type= "reset" name="reset" value= "reset">
    <input type = "submit" name="submit" value = "ok" >
    </form>
</html>