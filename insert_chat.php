<?php

require 'db.php';
session_start();
if ($_SESSION['email']==null){
    $_SESSION['msg']="Try to access your account through the login page.";
    $_SESSION['msg_head']='ERROR';
    header("location: msg.php");
}

$from = $mysqli->escape_string($_SESSION['username']);
$to = $mysqli->escape_string($_POST['to_user_id']);
$msge = $mysqli->escape_string($_POST['chat_message']);
$msg = trim($msge);

if($mysqli->query("INSERT into gagan_msg values('$from','$to','$msg',NOW())")){
    echo fetch_all_data($from, $to, $mysqli);
}
else{
    echo"NOOOOOOOOOO";
}

function fetch_all_data($from, $to, $mysqli){
    $fetchin =  $mysqli->query("SELECT * from gagan_msg where (gfrom='$from' and gto = '$to') or (gfrom='$to' and gto = '$from') order by occur desc");
    
    $output = '<ul class="list-unstyled">';
    while( $row = $fetchin->fetch_assoc())
    {
     $user_name = '';
     if($row["gfrom"] == $from)
     {
      $uname = '<b class="text-success">You</b>';
     }
     else
     {
      $uname = '<b class="text-danger">'.$to.'</b>';
     }
     $output .= '
     <li style="border-bottom:1px dotted #ccc">
      <p>'.$uname.' - '.$row["msg"].'
       <div align="right">
        - <small><em>'.$row['occur'].'</em></small>
       </div>
      </p>
     </li>
     ';
    }
    $output .= '</ul>';
    return $output;
   }

?>
