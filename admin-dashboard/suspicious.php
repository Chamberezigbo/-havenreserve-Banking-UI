<?php
require 'db.php';
$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));

if ($result) {
     $suspicious = $result['suspicious'];
     $sql = "UPDATE  users SET suspicious = !$suspicious  WHERE id= $id";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          header("Location:view_profile.php?id=$id");
     } else {
          die('sorry error occurred');
     }
} else {
     die('sorry error occurred fetching user');
}
