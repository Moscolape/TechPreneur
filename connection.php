<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "registered_users";
$dbtable = "users";


$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if ($con === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
}

?>