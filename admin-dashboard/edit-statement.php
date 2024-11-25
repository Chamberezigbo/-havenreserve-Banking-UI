<?php
session_start();
require_once('db.php');
$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");

if (isset($_POST['send'])) {
     $amount = trim($_POST['amount']);
     $narration = trim($_POST['narration']);
     $date = $_POST['date'];
     $email = $_POST['email'];
     $debit = $_POST['debit'];
     $credit = $_POST['credit'];

     if ($_POST['status'] == 'successful') {
          $status = 1;
     } else {
          $status = 0;
     }

     if ($debit > 0) {
          $sql = "Select * from `users` WHERE email = '$email'";
          $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          if ($result) {
               $balance = $result['balance'];
          } else {
               die("Sorry you don't have permission to view this page");
          }

          $newBalance = $balance - $amount;


          $sql = "UPDATE  users SET balance ='$newBalance'  WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
               $sql2 = "UPDATE statement
               SET date = '$date',
               debit = '$amount',
               balance = '$newBalance',
               status = '$status',
               narration = '$narration' ,
               credit = '$credit'
               WHERE id = $id";
               $result = mysqli_query($conn, $sql2);
               if ($result) {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Account successfully Updated";
                    header("Location:all-user.php");
               } else {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Issues updating statement";
                    header("Location:all-user.php");
               }
          } else {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = " error with fetching user";
               header("Location:all-user.php");
          }
     } else {
          $sql = "Select * from `users` WHERE email = '$email'";
          $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          if ($result) {
               $balance = $result['balance'];
          } else {
               die("Sorry you don't have permission to view this page");
          }

          $newBalance = $balance + $amount;


          $sql = "UPDATE  users SET balance ='$newBalance'  WHERE email='$email'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
               $sql2 = "UPDATE statement
               SET date = '$date',
               debit = '$debit',
               balance = '$newBalance',
               status = '$status',
               narration = '$narration' ,
               credit = '$amount'
               WHERE id = $id";
               $result = mysqli_query($conn, $sql2);
               if ($result) {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Account successfully Updated";
                    header("Location:all-user.php");
               } else {
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Issues updating statement";
                    header("Location:all-user.php");
               }
          } else {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = " error with fetching user";
               header("Location:all-user.php");
          }
     }
} else {
     $_SESSION['error'] = 1;
     $_SESSION['errorMassage'] = " Incorrect Account Number";
     header("Location:all-user.php");
}
