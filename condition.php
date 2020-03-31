<?php
require 'db.php';
session_start();
if(isset($_COOKIE['rememberforcookie_gagan'])){
    if($_COOKIE['rememberforcookie_gagan'] != ''){
        $cook=$_COOKIE['rememberforcookie_gagan'];
        $result = $mysqli->query("SELECT * FROM gagan_users where password='$cook'");
        if($result->num_rows>0){
            $user = $result->fetch_assoc();
            $_SESSION['username']=$user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['gender'] = $user['gender'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['fname'] = $user['fname'];
            $_SESSION['lname'] = $user['lname'];

        }

    }

}

if ($_SESSION['email']==null){
    $_SESSION['msg']="Try to access your account through the login page.";
    $_SESSION['msg_head']='ERROR';
    header("location: msg.php");
}

if(isset($_POST['submit'])){
    $username=$_SESSION['username'];
    $fileName = "uploads/photo".$username;
    $file_tmper = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($file_tmper,PATHINFO_EXTENSION);
    $targetFilePath = $fileName.".".$fileType;

    if(isset($_POST["submit"]) && !empty($_FILES["photo"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
        if(in_array($fileType, $allowTypes)){
            
            //Delete any previo profile_photo
            $delete_prev = $mysqli->query("SELECT * FROM gagan_users where profile_photo ='".$fileName.".jpg' OR profile_photo ='".$fileName.".png' OR profile_photo ='".$fileName.".jpeg' OR profile_photo ='".$fileName.".gif' OR profile_photo ='".$fileName.".JPG' OR profile_photo ='".$fileName.".PNG' OR profile_photo ='".$fileName.".JPEG' OR profile_photo ='".$fileName.".GIF' ");
            if ($delete_prev->num_rows > 0){
                $user = $delete_prev->fetch_assoc();
                unlink($user['profile_photo']);
                
            }

            // Upload file to server
            if(move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $mysqli->query("UPDATE gagan_users SET profile_photo ='".$targetFilePath."'WHERE username='".$username."'");
                if($insert){
                    $_SESSION['msg'] = "The profile photo has been updated successfully.";
		    $_SESSION['msg_head']="SUCCESS";
		    $_SESSION['photo']=$targetFilePath;
                    header("location: msg_on_profile.php");
                }else{
                    $_SESSION['msg'] = "File upload failed, please try again.";
                    $_SESSION['msg_head']="ERROR";
                    header("location: msg_on_profile.php");
                } 
            }else{
                $_SESSION['msg'] = "Sorry, there was an error uploading your file. Try reducing size of your file.";
                $_SESSION['msg_head']="ERROR";
                header("location: msg_on_profile.php");
            }
        }else{
            $_SESSION['msg'] = 'Sorry, only jpg, jpeg, png & gif files are allowed to upload.';
            $_SESSION['msg_head']="ERROR";
            header("location: msg_on_profile.php");
        }
    }else{
        $_SESSION['msg'] = 'Please select a file to upload.';
        $_SESSION['msg_head']="!!!";
        header("location: msg_on_profile.php");
    }
}
?>


<html>

<head><title>Update profile photo</title></head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="reset.css">
        <link rel="stylesheet" type="text/css" href="photo.css">
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

    <div id="login" class="container " >
        <br><br>
        <h1><center><font color="white">Upload Profile Photo</font></center></h1><br>
	<br>
<center> <font color='white'>Please upload your profile photo to proceed</font></center>
<br>
        <form action="profile_photo.php" method="POST" enctype="multipart/form-data">
            <center><input type="file" name= "photo" style="color:white;"><br><br><br>
            <button name="submit" type="submit" class="loginbtn">Upload</button></center>

        </form>

    </div>


</body>

</html>
