<?php
require 'db.php';
session_start();
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = $mysqli->escape_string($data);
   return $data;
}
$fname = test_input($_POST['fname']);
$lname = test_input($_POST['lname']);
$phone = test_input($_POST['phone']);
$gender = test_input($_POST['gender']);
$email = test_input($_POST['email']);
$username = test_input($_POST['username']);
$password = test_input(password_hash($_POST['password'],PASSWORD_BCRYPT)); 

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['msg_head']='ERROR';
    $_SESSION['msg']='Please enter a proper email address';                
    header("location: msg.php");
}


if (!preg_match("/^[6789][0-9]{9}$/",$phone)) {
    $_SESSION['msg_head']='ERROR';
    $_SESSION['msg']='Please enter a correct indian phone number';                
    header("location: msg.php");
}

$result = $mysqli->query("SELECT * FROM gagan_users where email='$email' or username='$username' ") or die($mysqli->error());
if ($result->num_rows > 0){
    $_SESSION['msg_head']='ERROR';
    $_SESSION['msg']='User with these credentials already exists!';                
    header("location: msg.php");
}
else{
    $_SESSION['password']=$password;
    $_SESSION['fname']=$fname ;
    $_SESSION['lname']=$lname ;
    $_SESSION['phone']=$phone;
    $_SESSION['gender']=$gender;
    $_SESSION['email']=$email ;
    $_SESSION['username']=$username;
    $hash = $mysqli->escape_string(md5(rand(0,1000)));
    $_SESSION["link"] = "http://ec2-54-164-211-9.compute-1.amazonaws.com/gagan/verify.php?email=$email&hash=$hash";

    $to=$email;
        $Subject="Account Verification ";
        $message_body = "
        Hello $first_name,
        Thank you for signing up!
        Please click this link to activate your account:
        ".$_SESSION['link']."";
        mail($to,$Subject,$message_body);                                  //send verification link to email of the user
        
    $_SESSION['msg_head']='ACCOUNT VERIFICATION';
    $_SESSION['msg']='A mail has been sent to you for email verification. You need to check it to continue ';                                                            ///check if user is already registered or not 
    header("location: msg.php");
}
?>
