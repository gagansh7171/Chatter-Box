<?php
session_start();
if(isset($_SESSION['remember']) && isset($_SESSION['rememberforcookie_gagan'])){
    if(isset($_SESSION['remember']) == 'yes'){
        setcookie('rememberforcookie_gagan',$_SESSION['rememberforcookie_gagan'], time() + (2*24*60*60), "/");

        setcookie('rememberforcookie_gagan_email',$_SESSION['email'], time() + (2*24*60*60), "/");
    }
}
session_destroy();
?>
<html>
    <head>
        <title>Log Out</title>

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
    <body>
        <center><div class="container">
            <a href ="index.html"><h1 class="display-3">Converse Point</h1></a>
        </div></center><hr size=30>

        <div id="login" class="container ">
            <br><br>
            <center><font color="white"><h1>Logged Out</h1><br>

            You have logged out successfully.
            </font></center>

            <div class="container col-lg  text-white"  style="margin-top:140px;margin-left:100px;"><a href="index.php"><button class="btnstyle">
            <center><h4>Home</h4></center></button></a>
            </div>
        </div>


    </body>
</html>
