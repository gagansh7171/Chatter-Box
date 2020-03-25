<?php
session_start();

?>
<html>
    <head>
        <title><?php echo $_SESSION['msg_head'] ;?></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="photo.css">
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
            <center><font color="white"><h1><?php echo $_SESSION['msg_head'] ;?></h1><br>
            
            <?php 
                       
                 echo "<br><center> <font color='white'>".$_SESSION['msg']."</font></center>";
                                
            ?></font></center>
                                

            <div class="container col-lg  text-white"  style="margin-top:140px;margin-left:100px;"><a href="index.php"><button class="loginbtn">
            <center><h4>Home</h4></center></button></a>
            </div>
        </div>


    </body>
</html>
