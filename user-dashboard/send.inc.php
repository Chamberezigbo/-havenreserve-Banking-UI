<?php
//check if session is started already
if (session_status() === PHP_SESSION_NONE) session_start();

require_once('db.php');
require_once('../core/mail.php');
 
if (isset($_POST['send'])) {
     $debit = ($_POST['amount']) * 1;
     $accountNumber = trim($_POST['accountNumber']);
     $accountName = trim($_POST['accountName']);
     $narration = trim($_POST['narration']);
     $bankName = trim($_POST['bankName']);
     $bankAddress = trim($_POST['bankAddress']);
     $swiftCode = trim($_POST['swiftCode']);
     $pin = trim($_POST['pin']);
     $credit = 0;
     $surname = $_SESSION['surname'];
     $accountType = $_SESSION['accountType'];

     $dbPin = (int)$_SESSION['transferCode'];
     $currency = $_SESSION['currency'];
     $dbBalance = $_SESSION['balance'] * 1;
     $date = date("Y/m/d");
     $email = $_SESSION['email'];
     $status = 0;
     $transactionID = rand(10000, 99999);



     if ($pin != $dbPin) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "Incorrect Pin";
          header("Location:transfer.php");
          exit();
     } elseif ($debit > $dbBalance) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "Sorry Insufficient Balance ";
          header("Location:transfer.php");
          exit();
     } else {
          $sql = "SELECT * FROM users WHERE email = '$email'";
          $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
          if (($result)) {
               if ($result['isDisable']) {
                    header("Location:404.code.php"); // change url //
                    exit();
               } else {
                    $currentBalance = $dbBalance - $debit;
                    $sql = "UPDATE  users SET balance ='$currentBalance'  WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
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
                              header("Location:transfer.php");
                              exit();
                         } else {
                              mysqli_stmt_bind_param(
                                   $stmt,
                                   "sssssssss",
                                   $email,
                                   $date,
                                   $credit,
                                   $currentBalance,
                                   $debit,
                                   $accountNumber,
                                   $accountName,
                                   $status,
                                   $narration
                              );
                              mysqli_stmt_execute($stmt);
                              $_SESSION['error'] = 1;
                              $_SESSION['errorMassage'] = "You have successfully transferred";
                              $_SESSION['balance'] =  $currentBalance;

                              // receive details //
                              $_SESSION['receiverName'] = $accountName;
                              $_SESSION['receiverNumber'] = str_pad(substr($accountNumber, -4), strlen($accountNumber), '*', STR_PAD_LEFT);
                              $_SESSION['debit'] =
                                   number_format($debit);
                              $_SESSION['bankName'] = $bankName;
                              $_SESSION['bankAddress'] = $bankAddress;
                              $_SESSION['narration'] = $narration;
                              $_SESSION['$swiftCode '] = $swiftCode;
                              $subject = 'Debit Alert';
                              $action = "Debited";

                              sendMail($email, $surname, $subject, str_replace([
                                   "##surname##", "##accountNumber##", '##narration##', '##ID##', "##date##", "##oldBalance##", "##action##",
                                   '##balance##', "##amount##", "##accountName##", "##$##", '##accountType##'
                              ], [
                                   $surname, $accountNumber, $narration, $transactionID, $date, $dbBalance, $action, $currentBalance, $debit, $accountName,  $currency, $accountType
                              ], file_get_contents("../alert-mail.php")));

                              header("Location:transfer-success.php");
                              exit();
                         }
                    } else {
                         echo (mysqli_error($conn));
                         exit();
                    }
               }
          }
     }
}
