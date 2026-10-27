<?php
session_start();
include 'connectdb.php';

$type = "deposit";

$money = $_POST['money'];
$chaeck = $_POST['ues'] ?? 0;
$point = $_POST['point'];
$pf = 0 ;
$re = 0 ;
if($chaeck > 0 && $point >= 1000){
    $pf = floor($point/1000);
    $re = $point % 1000;
    echo "You use point .$pf.And.You have .$re";
    }else{
    echo "<br>You haven't point<br> ";
    }

function fee_money($m){
    $f = 0;
    $t = 0;

    if($m < 100){
        $f = 5;
        $t = $m + $f;
        $m -= $f;

    }elseif($m >= 100 && $m <= 500){
        $f = $m * (5 / 100);
        $t = $m + $f;
        $m -= $f;

    }elseif($m > 500 && $m <= 1000){
        $f = $m * (4 / 100);
        $t = $m + $f;
        $m -= $f;

    }elseif($m > 1000 && $m <= 5000){
        $f = $m * (3 / 100);
        $t = $m + $f;
        $m -= $f;
    }

    return [$t, $f, $m];
}


[$total, $fee, $money_in] = fee_money($money);

$fee = $fee - $pf ; 

echo "Deposit : ".$money." $";
echo "<br>Fee : ".$fee." $";
echo "<br>Total amount to pay : ".$total." $";
echo "<br>Amount credited to the account : ".$money_in." $<br>";

$id = $_SESSION['id'];


$link->begin_transaction();

try{
 
    $sql = "UPDATE tb_wallet
            SET money = money + '$money_in'
            WHERE member_id = '$id'";

    if(!$link->query($sql)){
        throw new Exception("Update wallet failed");
    }

    if($link->affected_rows == 0){
        throw new Exception("Wallet not found");
    }
    
    $sql = "INSERT INTO tb_point_transactions
            (member_id,point_type,points,remaining_points,transaction_id,earned_at,expired_at,used_at)
            VALUES ();";

    $status = "success";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee,discount, total_amount, related_user_id, status)
            VALUES
            ('$id', '$type', '$money', '$fee','$pf','$money_in', '$id', '$status')";

    if(!$link->query($sql)){
        throw new Exception("Insert transaction failed");
    }
    $t_id = mysqli_insert_id($link);
    if($chaeck > 0 && $point >= 1000){
    $sql = "UPDATE tb_walet
            SET point_balance = point_balance - ($pf*1000)
            WHERE member_id = '$id';";
    
    if(!$link->query($sql)){
        throw new Exception("Update wallet point failed");
    }
    $type = "use";
    $pf=$pf*1000;
    $sql = "INSERT INTO tb_point_transactions
            (member_id,point_type,points,remaining_points,transaction_id,used_at)
            VALUES ('$id','$type','$pf','$re','$t_id',NOW());";
    if(!$link->query($sql)){
        throw new Exception("Insert point_transaction failed");
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
    header("refresh:1;url='show_wallet.php'");
}

?>