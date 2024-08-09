<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "userinfo";

$conn = mysqli_connect($server, $user, $pass, $database);

if(!$conn){
    die ("<script>alert('connection failed')</script>");
}

?>