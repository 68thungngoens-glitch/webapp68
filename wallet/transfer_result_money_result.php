<?php
session_start();
include 'connectdb.php';

$id_in = $_POST['id_in'];       
$id_out = $_SESSION['id'];       
$money = $_POST['money'];        
$fee = $money * (1 / 100);       
$total = $money + $fee;          

$link->begin_transaction();

try {


    $sql = "UPDATE tb_wallet
            SET money = money + '$money'
            WHERE member_id = '$id_in'";

    if (!$link->query($sql)) {
        throw new Exception("Update receiver wallet failed");
    }

    if ($link->affected_rows == 0) {
        throw new Exception("Receiver wallet not found");
    }


  
    $sql = "UPDATE tb_wallet
            SET money = money - '$total'
            WHERE member_id = '$id_out'
            AND money >= '$total'";

    if (!$link->query($sql)) {
        throw new Exception("Update sender wallet failed");
    }

    if ($link->affected_rows == 0) {
        throw new Exception("Sender wallet not found or insufficient money");
    }



    $status = "success";
    $type = "transfer_out";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee, total_amount, related_user_id, status)
            VALUES
            ('$id_out', '$type', '$money', '$fee', '$total', '$id_in', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert sender transaction failed");
    }

    $type = "transfer_in";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee, total_amount, related_user_id, status)
            VALUES
            ('$id_in', '$type', '$money', '0', '$money', '$id_out', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert receiver transaction failed");
    }



    $link->commit();

    echo "Transfer complete";
    echo "<br>Save transaction complete";

    header("refresh:2;url='show_wallet.php'");

} catch (Exception $e) {


    $link->rollback();

    echo "Transfer fail";
    echo "<br>Error : " . $e->getMessage();

    header("refresh:1;url='show_wallet.php'");
}
?>