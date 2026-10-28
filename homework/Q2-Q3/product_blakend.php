<?php
    include "connect.php";
    $name = $_POST["member_name"];
    $price = $_POST["member_price"];
    if($name == ""||$price == ""){
        echo "ไปเขียนมาใหม่" ;
        header("refresh:1; url=product_input.php");
    }else{ 
        $sql = "INSERT INTO tb_product(product_name,product_price)
                VALUES ('$name','$price');";
        $result = mysqli_query($link,$sql);
        if($result){
            echo "บันทึกลง db เรียบร้อย";
            header("refresh:1; url=product_show.php");
        }else{
            echo "ไม่ได้บันทึกลง db ";
            header("refresh:1; url=product_input.php");
        }
    }
?>