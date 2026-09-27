<?php
    session_start();

    include "connectdb.php";

    $money = $_POST['money'];

    if($money<100){
        $money += 5;
        echo "VAT : 5 $<br>TATAL : ".$money.".$";
    }elseif($money>=100&&$money<=500){
       $vat = (5/100)*$money;
       $money += $vat;
       echo "VAT : ".$vat." $<br>TATAL : ".$money.".$";
    }elseif($money>500&&$money<=1000){
       $vat = (4/100)*$money;
       $money += $vat;
       echo "VAT : ".$vat." $<br>TATAL : ".$money.".$";
    }elseif($money>1000&&$money<=5000){
       $vat = (3/100)*$money;
       $money += $vat;
       echo "VAT : ".$vat." $<br>TATAL : ".$money.".$";
    }



?>