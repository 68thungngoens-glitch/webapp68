<?php
session_start();
include 'connectdb.php';

$id_in = $_POST['id_in'];       
$id_out = $_SESSION['id'];       
$money = $_POST['money'];        
$fee = $money * (1 / 100);       
$total = $money + $fee; 

date_default_timezone_set('Asia/Bangkok');

$id_in = $_POST['id_in'];
$id_out = $_SESSION['id'];
$money = (float) $_POST['money'];

$fee = $money * 0.01;
$total = $money + $fee;

$time = new DateTimeImmutable('now',new DateTimeZone('Asia/Bangkok'));

function calculateTransferPoints(
    float $amount,
    DateTimeImmutable $time): int {
    if ($amount < 1000) {
        return 0;
    }

    $time = $time->setTimezone(
        new DateTimeZone('Asia/Bangkok')
    );

    $isWednesday = $time->format('N') === '3';
    $hourMinute = $time->format('H:i');

    $isSpecialHour =
        $hourMinute >= '19:00' &&
        $hourMinute < '20:00';

    $rate = ($isWednesday || $isSpecialHour)
        ? 0.02
        : 0.01;

    return (int) floor($amount * $rate);
}

$point = calculateTransferPoints($money, $time);

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
            (member_id, transaction_type, amount, fee, discount, total_amount, related_user_id, status)
            VALUES
            ('$id_out', '$type', '$money', '$fee','$point', '$total', '$id_in', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert sender transaction failed");
    }

    $type = "transfer_in";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee,discount, total_amount, related_user_id, status)
            VALUES
            ('$id_in', '$type', '$money', '0','0', '$money', '$id_out', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert receiver transaction failed");
    }



    $link->commit();

    echo "Transfer complete";
    echo "<br>Save transaction complete";

   // header("refresh:2;url='show_wallet.php'");

} catch (Exception $e) {


    $link->rollback();

    echo "Transfer fail";
    echo "<br>Error : " . $e->getMessage();

   // header("refresh:1;url='show_wallet.php'");
}
?>