<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "banking";

// $dbHost = "localhost";
// $dbUser = "bluerid4_bluerid4";
// $dbPass = "bluerid4_bluerid4";
// $dbName = "bluerid4_bluerid4";


$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
     die("Database not connected");
}
