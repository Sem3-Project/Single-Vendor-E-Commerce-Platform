<?php

$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "single";

// Create connection
$connection = mysqli_connect($hostname, $username, $password,$databasename);
// Check connection
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}else{
    // echo 'done';
}
?>