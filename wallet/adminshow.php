<?php
    session_start();
    include 'connectdb.php';

    function getnumber($link,$sql){
        $result = mysqli_query($link,$sql);

        if(!$result){
            return 0 ;
        }

        $row = mysqli_fetch_row($result);
        
        return $row ? ($row[0] ?? 0 ): 0 ;
    }

    $total_members = getnumber($link,"SELECT COUNT(*) FROM tb_member");
    $total_money = getnumber($link,"SELECT COALESCE(SUM(money),0) FROM tb_wallet");
    $total_points = getNumber($link,"SELECT COALESCE(SUM(point_balance), 0) FROM tb_wallet");
    $total_transactions = getNumber($link,"SELECT COUNT(*) FROM tb_transactions");
    $total_income = getNumber(
    $link,
    "SELECT COALESCE(SUM(GREATEST(fee - discount, 0)), 0)
     FROM tb_transactions
     WHERE transaction_type IN ('deposit', 'transfer_out')
       AND status = 'success'"
);


$today_income = getNumber(
    $link,
    "SELECT COALESCE(SUM(GREATEST(fee - discount, 0)), 0)
     FROM tb_transactions
     WHERE transaction_type IN ('deposit', 'transfer_out')
       AND status = 'success'
       AND created_at >= CURDATE()
       AND created_at < CURDATE() + INTERVAL 1 DAY"
);


$month_income = getNumber(
    $link,
    "SELECT COALESCE(SUM(GREATEST(fee - discount, 0)), 0)
     FROM tb_transactions
     WHERE transaction_type IN ('deposit', 'transfer_out')
       AND status = 'success'
       AND created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01')
       AND created_at < DATE_FORMAT(CURDATE() + INTERVAL 1 MONTH, '%Y-%m-01')"
);


$expired_lots = getNumber(
    $link,
    "SELECT COUNT(*)
     FROM tb_point_lots
     WHERE expired_at <= NOW()
       AND remaining_points > 0"
);

$expiring_lots = getNumber(
    $link,
    "SELECT COUNT(*)
     FROM tb_point_lots
     WHERE expired_at > NOW()
       AND expired_at <= DATE_ADD(NOW(), INTERVAL 1 DAY)
       AND remaining_points > 0"
);

$member_filter = isset($_GET['member_id'])
    ? (int)$_GET['member_id']
    : 0;

$sql = "SELECT t.transaction_id, t.member_id,
               m.member_name, t.transaction_type,
               t.amount, t.fee, t.discount, t.total_amount,
               t.related_user_id, t.status, t.created_at
        FROM tb_transactions t
        LEFT JOIN tb_member m ON m.member_id = t.member_id";

if ($member_filter > 0) {
    $sql .= " WHERE t.member_id = " . $member_filter;
}

$sql .= " ORDER BY t.created_at DESC LIMIT 100";

$result_transactions = mysqli_query($link, $sql);

if (!$result_transactions) {
    exit("ไม่สามารถอ่านรายการธุรกรรมได้");
}

function h($value) {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>

    <h2>Admin Dashboard</h2>

    Name admin :
    <?php echo h($_SESSION['name'] ?? 'Admin'); ?>
    <br>

    All member :
    <?php echo number_format($total_members); ?>
    <br>

    Money all in Wallet :
    <?php echo number_format((float)$total_money, 2); ?> $
    <br>

    Point all in wallet :
    <?php echo number_format((float)$total_points); ?>
    <br>

    Transactions all :
    <?php echo number_format($total_transactions); ?>
    <br><br>

    <hr>

    <h3>Income</h3>

    Total income :
    <?php echo number_format((float)$total_income, 2); ?> $
    <br>

    Today income :
    <?php echo number_format((float)$today_income, 2); ?> $
    <br>

    Month income :
    <?php echo number_format((float)$month_income, 2); ?> $
    <br><br>

    <hr>

    <h3>Point Status</h3>

    Expired point lots :
    <?php echo number_format($expired_lots); ?>
    <br>

    Point lots expiring within 24 hours :
    <?php echo number_format($expiring_lots); ?>
    <br><br>

    <hr>

    <h3>Transaction List</h3>

    <form method="GET">
        Search Member ID :
        <input
            type="number"
            name="member_id"
            min="1"
            value="<?php echo $member_filter > 0 ? $member_filter : ''; ?>"
        >
        <button type="submit">Search</button>
        <a href="admin.php">Show All</a>
    </form>

    <br>

    <table border="1" cellpadding="5">
        <tr>
            <th>Transaction ID</th>
            <th>Member ID</th>
            <th>Member Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Fee</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Related User</th>
            <th>Status</th>
            <th>Date Time</th>
        </tr>

        <?php if (mysqli_num_rows($result_transactions) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result_transactions)) { ?>
                <tr>
                    <td><?php echo h($row['transaction_id']); ?></td>
                    <td><?php echo h($row['member_id']); ?></td>
                    <td><?php echo h($row['member_name']); ?></td>
                    <td><?php echo h($row['transaction_type']); ?></td>
                    <td><?php echo number_format((float)$row['amount'], 2); ?></td>
                    <td><?php echo number_format((float)$row['fee'], 2); ?></td>
                    <td><?php echo number_format((float)$row['discount'], 2); ?></td>
                    <td><?php echo number_format((float)$row['total_amount'], 2); ?></td>
                    <td><?php echo h($row['related_user_id']); ?></td>
                    <td><?php echo h($row['status']); ?></td>
                    <td><?php echo h($row['created_at']); ?></td>
                </tr>
            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="11">No transactions found</td>
            </tr>

        <?php } ?>
    </table>

    <br>
    <a href="logout.php">Log Out</a>

</body>
</html>
