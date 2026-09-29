<?php
session_start();
include 'connectdb.php';

$type = "deposit";

$money = $_POST['money'];

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


    
    $status = "success";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee, total_amount, related_user_id, status)
            VALUES
            ('$id', '$type', '$money', '$fee', '$total', '$id', '$status')";

    if(!$link->query($sql)){
        throw new Exception("Insert transaction failed");
    }

    $link->commit();

    echo "Deposit complete";
    echo "<br>Save transaction complete";


}catch(Exception $e){

    $link->rollback();

    echo "Deposit fail";
    echo "<br>Error : ".$e->getMessage();
}

?>