<?php

require 'db.php';
session_start();
if ($_SESSION['email']==null){
    $_SESSION['msg']="Try to access your account through the login page.";
    $_SESSION['msg_head']='ERROR';
    header("location: msg.php");
}
if(isset($_POST['update'])){
    
    $testphone = test_input($_POST["phone"]);
    if (!preg_match("/^[6789][0-9]{9}$/",$testphone)) {
        $_SESSION['msg_head']='ERROR';
        $_SESSION['msg']='Please enter a correct indian phone number';                
        header("location: msg_on_profile.php");
    }
    
    if(isset($_POST['fname2'])){
        $sql = $mysqli->query("update gagan_users set fname='".$_POST['fname2']."' where email='".$_SESSION['email']."'");
        $_SESSION['fname']=$_POST['fname2'];
    }

    if(isset($_POST['lname2'])){
        $sql = $mysqli->query("update gagan_users set lname='".$_POST['lname2']."' where email='".$_SESSION['email']."'");
        $_SESSION['lname']=$_POST['lname'];
    }

    if(isset($_POST['phone'])){
        $sql = $mysqli->query("update gagan_users set phone='".$_POST['phone']."' where email='".$_SESSION['email']."'");
        $_SESSION['phone']=$_POST['phone'];
    }
    if(isset($_POST['gender'])){
        $sql = $mysqli->query("update gagan_users set gender='".$_POST['gender']."' where email='".$_SESSION['email']."'");
        $_SESSION['gender']=$_POST['gender'];
    }
    header("location:profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!------------------------>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--------------------------------->
  <!-- google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <link rel="stylesheet" href="update.css" type="text/css">
    <title>Update</title>
</head>
<body>

    <div class="container-fluid row">
        <div class="col-md">
            <a ><h1 class="display-3" style="color:blue;"><img src="./asset/logo.png"  style="height:80px;">Converse Point</h1></a>
        </div>
            
            <br>
            <div class="col-md"><br>
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
    <br><br> 
    <form method="POST" action="update.php" enctype="multipart/form-data"></form>
    <center>
    <div class="main">
        
        <div class="item1"><B>Key :</B></div>
        <div class="item2"><b>Old value</b></div>
        <div><b>New Value</b></div>

        <div class="item1">First Name :</div>
        <div class="item2"><?php echo $_SESSION['fname'] ?></div>
        <div><input type="text" name="fname2" size=10> </div>

        <div class="item1">Last Name :</div>
        <div class="item2"><?php echo $_SESSION['lname'] ?></div>
        <div><input type="text" name="lname2" size=10> </div>


        <div class="item1">Phone No. :</div>
        <div class="item2"><?php echo $_SESSION['phone'] ?></div>
        <div><input type="text" size=2 value="+91-" disabled style="background-color: rgb(255,255,255);padding: 6px 3px 6px 1px;"><input type="text" name='phone' size=8 style="padding:6px 3px 6px 1px ;"></div>


        <div class="item1">Gender :</div>
        <div class="item2">Male</div>
        <div><input type="radio" id="male" name="gender" value="male" >
            <label for="male">Male</label>&nbsp
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>&nbsp
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label>
        </div>

    </div>
    <br><br>
    <input type="submit" class="loginbtn" name="update" value="Update"> </input>
    </center>
</form>
</body>
</html>
