<?php
require 'db.php';
session_start();
$username= $mysqli->escape_string($_POST['username']);
$_SESSION['username']=$username; 
$_SESSION['$password']= $mysqli->escape_string($_POST['password']);
$result = $mysqli->query("SELECT * FROM users where username='$username'");
if ($result->num_rows == 0){
    $_SESSION['msg_head']='ERROR';
    $_SESSION['msg']='User with this username is not registered';                
    header("location: msg.php");
}
else{

    $user=$result->fetch_assoc();                                                    //if new user
    if(password_verify($_SESSION['$password'], $user['password'])){

        $_SESSION['email'] = $user['email'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];

        header("location: profile.php");
    }
    else{
        $_SESSION['msg_head']='ERROR';
        $_SESSION['msg']='You entered a wrong password';                
        header("location: msg.php");
    }
}

 