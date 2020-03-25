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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <link rel="stylesheet" type="text/css" href="index.css">
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
<center>
    <?php
        $users = $mysqli->query("SELECT * from gagan_users where not username='".$_SESSION['username']."'") or die($mysqli->error);
        while($user=$users->fetch_assoc()){
            echo "<a HREF='javascript:void(0)' onclick=\"chat_box('".$user['username']."','".$_SESSION['username']."')\"><div class=\"media\" id=\"people\">
            <div class=\"media-left\">
              <img src=\"".$user['profile_photo']."\" class=\"media-object\" >
            </div>
            <div class=\"media-body\">
              <h4 class=\"media-heading\">".$user['username']."</h4>
              <p>".$user['fname']." ".$user['lname']."</p>
              <p>Phone No. : ".$user['phone']."</p>
            </div>
          </div></a>
          <hr class=\"medias\">
            ";
        }
    ?>
    <div class="box_details"></div>
</center>
</body>
<script>
    function chat_box(touser, fromuser ){
        
        var box = '<div id="user_dialog_'+touser+'" class="user_dialog" title="You have chat with '+touser+'">';
        box += '<div style="height:400px; border:1px solid #ccc;overflow-y:scroll;margin-bottom:24px;padding:16px;" class="chat_history" data-touserid="'+touser+'" id="chat_history'+touser+'">';
        box += '</div>';
        box += '<div class="form-group">';
        box += '<textarea name="chat_message_'+touser+'" id="chat_message_'+touser+'" class="form-control"></textarea>';
        box += '</div><div class="form-group" align="right">';
        box += '<button type="button" name="send_chat" id="'+touser+'" class="btn btn-info send_chat">Send</button></div></div>';
        
        $('.box_details').html(box);
        history(touser);
        $("#user_dialog_"+touser).dialog({
            autoOpen:false,
            width:400
        });
        $('#user_dialog_'+touser).dialog('open');
        
    }
    function history(to_user_id)
    {
        $.ajax({
            url:"history.php",
            method:"POST",
            data:{to_user_id:to_user_id},
            success:function(data){
                $('#chat_history'+to_user_id).html(data);
            }
        });
    }

    function chatupdate()
    {
        $('.chat_history').each(function(){
            var to_user_id = $(this).data('touserid');
            history(to_user_id);
        });
    }
    setInterval(chatupdate(), 1500);

    $(document).on('click', '.send_chat', function(){
        var to_user_id = $(this).attr('id');
        var chat_message = $('#chat_message_'+to_user_id).val();
        $.ajax({
            url:"insert_chat.php",
            method:"POST",
            data:{to_user_id:to_user_id, chat_message:chat_message},
            success:function(data)
            {
                $('#chat_message_'+to_user_id).val('');
                $('#chat_history'+to_user_id).html(data);
            }
        })
    });
</script>
</html>