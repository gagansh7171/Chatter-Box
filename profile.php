<?php

require 'db.php';
session_start();
if ($_SESSION['email']==null){
    $_SESSION['msg']="Try to access your account through the login page.";
    $_SESSION['msg_head']='ERROR';
    header("location: msg.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

       
    </head>

    <body>
        
    <div class="container-fluid row">
    <div class="col-md"><a ><h1 class="display-3" style="color:blue;"><img src="./asset/logo.png"  style="height:80px;">Converse Point</h1></a></div>
        
        <br><div class="col-md"><br>
                <div class="dropdown" style="margin-left:550px;">
                    <button class="btn btn-secondary btn-light " type="button"  data-toggle="dropdown" >
                        <i class="material-icons" style="font-size:40px;color:blue">account_box</i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" >
                        <a class="dropdown-item" href="profile.php">Account</a>
                        <a class="dropdown-item" href="update.php">Update credentials</a>
                        <a class="dropdown-item" href="profile_photo.php">Update Profile Photo</a>
                        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
            </div>
        
    </div> 

    <hr size=30>
        <table>
            <tr>
                <td style="vertical-align:middle;">
                    <?php 
                    $us = $_SESSION['username'];
                    $sql = $mysqli->query("SELECT * FROM gagan_users where username = '$us'");
                    $row = $sql->fetch_assoc();
                    $imageURL = $row['profile_photo'];?>
                    <img src="<?php echo $imageURL; ?>" style="border-radius:50%;margin-left:250px;height:200px">
                    
                
                </td>

                <td>
                    <div class="card " style="border:2px solid grey; margin-top: 80px; margin-left:140px; width: 600px; border-radius: 4px; ">
                        <div class="card-body">
                            <p><font size="6">Name : <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> </font></p>
                            <p><font size="6">Username : <?php echo $_SESSION['username']; ?></font></p>
                            <p><font size="6">Email : <?php echo $_SESSION['email']; ?></font></p>
                            <p><font size="6">Phone No. : +91-<?php echo $_SESSION['phone']; ?></font></p>
                            <p><font size="6">Gender : <?php echo $_SESSION['gender']; ?></font></p>
                            

                            <a href="dashboard.php" class="btn" style="appearance: button; background-color: green; color:white;border-radius: 4px;padding: 8px 100px;text-decoration:  none;">Go to Dashboard</a>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <br><br><br>


      
    </body>
</html>
