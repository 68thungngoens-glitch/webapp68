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
$R_W = $_POST['member_R-W'];
$count = count($R_W);
    echo "<br>This is " ;
foreach($R_W as $index => $item){
    if ($count > 1 && $index == $count - 1){
        echo " and " .$item; 
    }else {
        echo $item;
    }
}
$date = $_POST['member_date'];
    echo "<br>วันที่เพื่มสิ้นค้า : ".date("d/m/Y H:i");
?>