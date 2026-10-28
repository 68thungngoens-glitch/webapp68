<?php
session_start();
include 'connectdb.php';
    

    $id = $_SESSION['id'];
    $sql = "SELECT point_balance FROM tb_wallet 
        WHERE member_id = '$id'";
    $result = mysqli_query($link,$sql);
    $arr = mysqli_fetch_array($result);
    $point = $arr["point_balance"];

$type = "deposit";

$money = $_POST['money'];
$chaeck = $_POST['ues'] ?? 0;
function fee_money($m){
    $f = 0;
    $t = 0;
    
    if($m < 100){
        $f = 5;
        $t = $m + $f;

    }elseif($m >= 100 && $m <= 500){
        $f = $m * (5 / 100);
        $t = $m + $f;

    }elseif($m > 500 && $m <= 1000){
        $f = $m * (4 / 100);
        $t = $m + $f;

    }elseif($m > 1000 && $m <= 5000){
        $f = $m * (3 / 100);
        $t = $m + $f;
    }
    return [$t, $f];
}
[$total, $fee] = fee_money($money);

echo "Deposit : ".$money." $";
echo "<br>Fee : ".$fee." $";
$pf = 0;           
$points_used = 0;  
$re = $point;      

if ($chaeck > 0 && $point >= 1000) {
    $available_discount = floor($point / 1000);

    $pf = min($available_discount, floor($fee));

    $points_used = $pf * 1000;
    $re = $point - $points_used;

    $fee = $fee - $pf;
    $total = $money + $fee;
}
echo "<br>Use point : ".$pf;
echo "<br>You have point : ".$re;
echo "<br>Total amount to pay : ".$total." $";
echo "<br>Amount credited to the account : ".$money." $<br>";



$id = $_SESSION['id'];


$link->begin_transaction();

try{
 
    $sql = "UPDATE tb_wallet
            SET money = money + '$money'
            WHERE member_id = '$id'";

    if(!$link->query($sql)){
        throw new Exception("Update wallet failed");
    }

    if($link->affected_rows == 0){
        throw new Exception("Wallet not found");
    }
    
    $status = "success";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee,discount, total_amount, related_user_id, status)
            VALUES
            ('$id', '$type', '$money', '$fee','$pf','$total', '$id', '$status')";
    if(!$link->query($sql)){
        throw new Exception("Insert transaction failed");
    }
    
    $t_id = mysqli_insert_id($link);
    if ($points_used > 0) {
    
   $sql = "UPDATE tb_point_lots
        SET remaining_points = remaining_points - $points_used
        WHERE member_id = '$id'
        AND remaining_points >= $points_used;";

    if (!$link->query($sql)) {
        throw new Exception("Update wallet point failed");
    }

    $sql = "UPDATE tb_wallet
            SET point_balance = point_balance - $points_used
            WHERE member_id = '$id'
              AND point_balance >= $points_used";

    if (!$link->query($sql)) {
        throw new Exception("Update wallet point failed");
    }

    if ($link->affected_rows !== 1) {
        throw new Exception("Insufficient points");
    }

    $sql = "INSERT INTO tb_point_transactions
            (member_id, point_type, points, remaining_points,
             transaction_id, used_at)
            VALUES
            ('$id', 'use', '$points_used', '$re',
             '$t_id', NOW())";

    if (!$link->query($sql)) {
        throw new Exception("Insert point transaction failed");
    }
}
    
    $link->commit();

    echo "Deposit complete";
    echo "<br>Save transaction complete";
    header("refresh:5;url='show_wallet.php'");
}catch(Exception $e){
    $link->rollback();

    echo "Deposit fail";
    echo "<br>Error : ".$e->getMessage();
    header("refresh:5;url='show_wallet.php'");
}

?>