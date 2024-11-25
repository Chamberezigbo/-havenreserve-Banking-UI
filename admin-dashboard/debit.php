<?php
session_start();
require_once('db.php');
require_once('../core/mail.php');

$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");

if (isset($_POST['send'])) {
     $amount = trim($_POST['amount']);
     $narration = trim($_POST['narration']);
     $date = $_POST['date'];
     $status = 1;
     $credit = 0;
     $transactionID = rand(10000, 99999);

     $sql = "Select * from `users` WHERE id = $id";
     $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
     if ($result) {
          $dbBalance = $result['balance'];
     } else {
          die("Sorry you don't have permission to view this page");
     }

     $newBalance = $dbBalance - $amount;


     $sql = "UPDATE  users SET balance ='$newBalance'  WHERE id='$id'";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          $sql = "SELECT * FROM users WHERE id = ?";
          $stmt = mysqli_stmt_init($conn);


          if (!mysqli_stmt_prepare($stmt, $sql)) {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = " Error occurred with your login";
               header("Location:all-user.php");
               exit();
          } else {
               mysqli_stmt_bind_param($stmt, "s", $id);
               mysqli_stmt_execute($stmt);
               $result = mysqli_stmt_get_result($stmt);
               if ($row = mysqli_fetch_assoc($result)) {
                    $email = $row['email'];
                    $surname = $row['surname'];
                    $accountName = $row['surname'] . " " . $row['otherName'];
                    $balance = $row['balance'];
                    $accountNumber = $row['accountNumber'];
                    $accountType = $row['accountType'];
                    $currency = $row['currency'];
                    $sql = "INSERT INTO statement (
                    email,date,credit,balance,debit,
                    accountNumber,accountName,status,narration
               ) VALUES (
                    ?,?,?,?,?,?,?,?,?
               )";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                         $_SESSION['error'] = 1;
                         $_SESSION['errorMassage'] = " Error occurred with your login";
                         header("Location:all-user.php");
                    } else {
                         mysqli_stmt_bind_param(
                              $stmt,
                              "sssssssss",
                              $email,
                              $date,
                              $credit,
                              $newBalance,
                              $amount,
                              $accountNumber,
                              $accountName,
                              $status,
                              $narration
                         );
                         mysqli_stmt_execute($stmt);
                    }
                    $subject = 'Debit Alert';
                    $action = "Debit";

                    sendMail($email, $surname, $subject, str_replace([
                         "##surname##", "##ID##", '##amount##', '##accountType##', "##accountNumber##", "##accountName##", "##narration##", "##date##", "##oldBalance##",
                         "##balance##", "##action##", "##$##",
                    ], [$surname, $transactionID, $amount, $accountType, $accountNumber, $accountName, $narration, $date, $dbBalance, $balance, $action, $currency], file_get_contents("../alert-mail.php")));
                    $_SESSION['error'] = 1;
                    $_SESSION['errorMassage'] = "Account successfully found";

                    header("Location:all-user.php");
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
}
