<?php
require 'db.php';
$uname=$_GET['uname'];
$result = $mysqli->query("SELECT * from gagan_users where username='$uname'") or die($mysqli->error());
if ($result->num_rows > 0){
    echo "Username already exists.";
}
else{ echo "";}
?>