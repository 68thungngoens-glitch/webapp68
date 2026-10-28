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

echo "You fee : ".$fee.".$<br>";
echo "You total : ".$total.".$<br>";

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
        ? 0.02 : 0.01;

    return (int) floor($amount * $rate);
}

$point = calculateTransferPoints($money, $time);

echo "You have point : ".$point."<br>";

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
            ('$id_out', '$type', '$money', '$fee','0', '$total', '$id_in', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert sender transaction_out failed");
    } 
    $transaction_id = mysqli_insert_id($link);

    $type = "transfer_in";

    $sql = "INSERT INTO tb_transactions
            (member_id, transaction_type, amount, fee,discount, total_amount, related_user_id, status)
            VALUES
            ('$id_in', '$type', '$money', '0','0', '$money', '$id_out', '$status')";

    if (!$link->query($sql)) {
        throw new Exception("Insert receiver transaction_in failed");
    }

    if($point > 0 ){
    
    $sql = "INSERT INTO tb_point_lots
        (member_id, points, remaining_points, earned_at, expired_at)
        VALUES 
        ('$id_out', '$point', '$point',NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY))";

    if (!$link->query($sql)) {
        throw new Exception("Insert receiver points failed");
    }

    $sql = "INSERT INTO tb_point_transactions
            (member_id, point_type, points, remaining_points,transaction_id, earned_at, expired_at)
        VALUES ('$id_out', 'earn','$point','$point','$transaction_id', NOW(),DATE_ADD(NOW(), INTERVAL 3 DAY))";

    if (!$link->query($sql)) {
        throw new Exception("Insert receiver points_transaction failed");
    }
    $sql = "UPDATE tb_wallet 
            SET point_balance = point_balance + '$point'
            WHERE member_id = '$id_out';";
    if (!$link->query($sql)) {
        throw new Exception("Insert receiver points update failed");
        }
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