<?php
session_start();
include 'connectdb.php';

$id = $_SESSION['id'];

$sql = "SELECT w.money,
        w.wallet_id,
        w.point_balance,
        t.transaction_id,
        t.transaction_type,
        t.amount,
        t.fee,
        t.discount,
        t.total_amount,
        t.related_user_id,
        t.status,
        t.created_at
        FROM tb_wallet w
        JOIN tb_transactions t ON t.member_id = w.member_id
        WHERE t.member_id = '$id'";

$result = mysqli_query($link, $sql);

$transactions = [];
$money = 0;
$wallet_id = 0;


while ($arr = mysqli_fetch_assoc($result)) {
    $money = $arr['money'];
    $wallet_id = $arr['wallet_id'];
    $point = $arr['point_balance'];
    $transactions[] = $arr;
}
?>

<html>
   
        MY WALLET YOU : <?php echo $_SESSION['name']; ?>

        <br>
        Money : <?php echo $money; ?>.$
        <br>
        Point : <?php echo $point; ?>.POINTS
        <br>
         <br><a href="deposit_money.php?point=<?php echo $point ;?>">Deposit Money :</a>
        <br><a href="withdraw_money.php">Withdraw Money :</a>
        <br><a href="list_transfer_money.php?id=<?php echo $wallet_id;?>">Transfer Money :</a>
<br>
        List :
        <br>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Transaction</td>
                <td>Amount</td>
                <td>Fee</td>
                <td>Point</td>
                <td>Total</td>
                <td>To User</td>
                <td>Status</td>
                <td>Date Time</td>
            </tr>

            <?php foreach ($transactions as $arr) { ?>
            <tr>
                <td><?php echo $arr['transaction_id']; ?></td>
                <td><?php echo $arr['transaction_type']; ?></td>
                <td><?php echo $arr['amount']; ?></td>
                <td><?php echo $arr['fee']; ?></td>
                <td><?php echo $arr['discount'];?></td>
                <td><?php echo $arr['total_amount']; ?></td>
                <td><a href="detail.php?id=<?php echo $arr['related_user_id']; ?>"><?php echo $arr['related_user_id']; ?></a></td>
                <td><?php echo $arr['status']; ?></td>
                <td><?php echo $arr['created_at']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <br><a href="logout.php">Log Out :</a>
  
</html>