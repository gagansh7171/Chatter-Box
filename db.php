<?php

$host = "ubuntu@ec2-54-164-211-9.compute-1.amazonaws.com";
$user = "first_year" ;
$pass = "first_year";
$db = "first_year";
$mysqli = new mysqli($host, $user, $pass,$db) or die($mysqli->error);


?>
