<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "stfms";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (!$conn){
    echo "Connection Failed!";
}

?>