<?php   session_start();
    if(isset($_SESSION['id'])){
        echo "you loging";
        header("refresh:1;url=show_wallet.php");
        exit();
    }
?>

<html>
    <form action='sign_up_result.php' method='POST'>
        SIGN_UP_MY_WALLET
        <br>Username : <input type='text' name='username'>
        <br>Password : <input type='password' name='password'>
        <br>Name : <input type='text' name='name'>
        <br><a href='login.php'>Back</a>
            <input type='submit' value='Sign_up'>
    </from>
</html>