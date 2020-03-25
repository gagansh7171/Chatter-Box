<?php
    require 'db.php';
    session_start();
if (isset($_SESSION['hash_it']))
    {
    if (isset($_POST['new'])){
        $email = $_SESSION['email_it'];
        $password = $mysqli->escape_string(password_hash($_POST['new_password'],PASSWORD_BCRYPT));
        $sql ="UPDATE gagan_users SET password = '".$password."' where email = '$email'";
        $result = $mysqli->query($sql);
        if ($result){
            $_SESSION['msg'] = 'Your password is updated successfully.';
            $_SESSION['msg_head']='SUCCESS';
            header('location: msg.php');

        }
        else{
            $_SESSION['msg_head']='ERROR';
            $_SESSION['msg'] = 'Sorry! your password update failed. Please try again.';
            header("location: msg.php");
        }
    }
    }
else{
    $_SESSION['msg'] = 'Please first go to forgot password on the home page';
    $_SESSION['msg_head']='ERROR';
    header("location: msg.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>Converse Point</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="index.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body><center><div class="container">
        <a href ="index.html"><h1 class="display-3">Converse Point</h1></a>
    </div></center><hr size=30>

    <div id="login" class="container " >
    <div class="container text-white" ><br><br><h1 ><center>Set new password</center></h1><br>
               <div style="margin-left:150px;"> <form action="change_your_pass.php" method="post" autocomplete="on">
                   <br>
                   <br>
                    <input type="text" name="new_password" placeholder="New Password here" required size=30 >
                <br>
                
                <br>
               <div style="margin-left:140px;"><button type="submit" class="button button-block loginbtn" name="new" >Update password</button>   </form>
                

            </div>
            </div>
            </div>

          </div>



    </div>


    </body>
</html>

