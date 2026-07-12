<?php
$name = $_POST['member_name'];
$price = $_POST['member_price'];
$description = $_POST['member_description'];
$category = $_POST['member_category'];
echo "This is name product : ".$name."<br>This is price :  ".$price ;
echo "<br>This is a product description : ".$description ; 
echo "<br>This is Product type : ";
if ($category == '1'){
    echo "อาหาร";
}else if ($category =='2'){
    echo "เครื่องดื่ม";
}else if ($category =='3'){
    echo "ขนม";
}else if ($category =='4'){
    echo "ของใช้";
}else{
    echo "อื่นๆ";
}
?>