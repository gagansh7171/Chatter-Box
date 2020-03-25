
<?php
    include 'db.php';
    session_start();

    if(isset($_POST['change_pass'])){

        $email = $mysqli->escape_string($_POST['email']);
        $_SESSION['email_it'] = $email;
        $check_email = $mysqli->query('SELECT * from gagan_users where email = "'.$email.'"');

        if($check_email->num_rows > 0){
            $hash_it = md5(rand(0,1000));
            $_SESSION['hash_it'] = $hash_it;

            $to=$email;
            $Subject="Change Password (Converse Point)";
            $message_body = "

            Please use the following hash to change your password:
            $hash_it 
            ";
            mail($to,$Subject,$message_body);
            header("location: verify_for_pass.php");
        }
        else{
            $_SESSION['msg_head']="ERROR";
            $_SESSION['msg'] = 'Your account is not registered in our database. Please register first.';
            header("location: msg.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Converse Point</title>
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

    <div id="login" class="container ">                
            <div class="container text-white" ><br><br><h1 ><center>Change your password</center></h1><br>
               <div style="margin-left:150px;"> <form action="forgot.php" method="post" autocomplete="on">
                   <br>Enter your email
                   <br>
                    <input type="text" name="email" placeholder="email" required size=30>
                <br>
                
                <br>
               <div style="margin-left:14%;"><button type="submit" class="button button-block loginbtn" name="change_pass">change my password</button>   </form>
                

            </div>
            </div>
            </div>

          </div>



    </div>


    </body>
</html>