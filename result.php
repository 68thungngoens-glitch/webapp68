<<<<<<< HEAD
<?php
$name = $_POST['member_name'];
$tel = $_POST['member_tel'];
$mail = $_POST['member_mail'];
$username = $_POST['member_username'];
$password = $_POST['member_password'];
$password = $_POST['member_password'];
$gender = $_POST['member_gender'];
$major = $_POST['mrmber_major'];
echo "This is your name ".$name."<br>This is your tel ".$tel."<br>This is your E-mail ".$mail."<br>This is your username ".$username."<br>This is your password ".$password;
echo "<br>This is your gender: " ;
if($gender=='1'){
    echo "male";
}
else if ($gender=='2'){
    echo "female";
}
echo "<br>This is your major: " ;
if($major='1'){
    echo "Computer science" ;
}
else if ($gender=='2'){
    echo "Information Technology";
}
else if ($gender=='3'){
    echo "Multimedia Technology";
}

=======
<?php 
$name=$_POST['member_name'];
$tel=$_POST['member_tel'];
$email=$_POST['member_email'];
$user=$_POST['member_user'];
$pass=$_POST['member_pass'];
$gender=$_POST['member_gender'];
$major=$_POST['member_major'];
echo "This is your name ".$name."<br>This is your tel ".$tel."<br>This is your E-mail ".$email."<br>This is you username ".$user."<br>This is your password ".$pass ;
echo "<br>This is your gender ";
if($gender=='1'){
    echo "male";
}
else if($gender=='2'){
    echo "female" ;
}
echo "<br>This is your major ";
if($major=='1'){
    echo "Computer Science";
}
else if($major=='2'){
    echo "Information Technology";
}
else if($major=='3'){
    echo "Multimedia Technology";
}
    
>>>>>>> d82a8c847894014455b258a31df5bb830f07d124
?>