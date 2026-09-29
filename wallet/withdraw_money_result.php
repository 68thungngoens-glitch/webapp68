<?php
    session_start();
    include 'connectdb.php';

    $type = "withdraw";
    $money = $_POST['money'];
    $id = $_SESSION['id'];
    $fee = '0';
    $link->begin_transaction();
   

try{

    
    $sql = "UPDATE tb_wallet
            SET money = money - '$money'
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
            ('$id', '$type', '$money', '$fee', '$money', '$id', '$status')";

    if(!$link->query($sql)){
        throw new Exception("Insert transaction failed");
    }

    $link->commit();

    echo "Withdraw complete";
    echo "<br>Save transaction complete";
    header("refresh:2;url='show_wallet.php'");
    


}catch(Exception $e){

    $link->rollback();

    echo "Withdraw fail";
    echo "<br>Error : ".$e->getMessage();
    header("refresh:2;url='show_wallet.php'");
   
}
?>