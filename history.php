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

echo fetch_all_data($from, $to, $mysqli);

function fetch_all_data($from, $to, $mysqli){
    $fetchin =  $mysqli->query("SELECT * from gagan_msg where (gfrom='$from' and gto = '$to') or (gfrom='$to' and gto = '$from') order by occur desc");
    
    $output = '<ul class="list-unstyled">';
    while( $row = $fetchin->fetch_assoc())
    {
     $message=trim($row["msg"]);
     str_replace("<","&lt;",$message);	    
     str_replace(">","&gt;",$message);	    
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
      <p>'.$uname.' - '.htmlspecialchars($message, ENT_COMPAT | ENT_HTML5, 'UTF-8').'
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
