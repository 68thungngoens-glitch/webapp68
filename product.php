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
    <br>Retail/Wholesale
    <br><input type="checkbox" name="member_R-W[]" value="retail">retail
        <input type="checkbox" name="member_R-W[]" value="wholesale">wholesale
    <br>Employee Name
    <br><input type="radio" name="member_name" value="1">tee
        <input type="radio" name="member_name" value="2">ta
        <input type="radio" name="member_name" value="3">aec
    <br><input type="hidden" name="member_date" value="<?php echo date('Y-m-d H:i:s');?>">
    <br><br>
    <input type= "reset" name="reset" value= "reset">
    <input type = "submit" name="submit" value = "ok" >
    </form>
</html>