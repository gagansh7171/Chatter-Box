<?php

require 'db.php';
session_start();

if(isset($_POST["verify_it"]))
{
    if ($_POST["link_it"] == $_SESSION["hash_it"]){

        
        
        header("location: change_your_pass.php");

    }

    



    else{
        $_SESSION['msg_head']="ERROR";
        $_SESSION['msg']="Invalid parameters provided for validation.";
        header("location: msg.php");
       //just for message
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
            <div class="container text-white" ><br><br><h1 ><center>Account Verification!</center></h1><br>
               <div style="margin-left:150px;"> <form action="verify_for_pass.php" method="post" autocomplete="on">
                   <br>Enter the hash sent to your email
                   <br>
                    <input type="text" name="link_it" placeholder="hash" required size=30 >
                <br>
                
                <br>
               <div style="margin-left:140px;"><button type="submit" class="button button-block loginbtn" name="verify_it">Verify</button>   </form>
                

            </div>
            </div>
            </div>

          </div>



    </div>


    </body>
</html>
