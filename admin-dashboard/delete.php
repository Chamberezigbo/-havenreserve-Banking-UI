<?php
require_once('db.php');
$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");
$sql = "DELETE FROM users  WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result) {
     header("location:all-user.php");
} else {
     echo (mysqli_error($conn));
     header("location:all-user.php?error=mysqli_error");
}
