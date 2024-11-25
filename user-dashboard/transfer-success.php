<?php
//check if session is started already
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <title> havenreserve Bank</title>

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/mycss.css?v=<?php echo time(); ?>">

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>
     <div class="alert200 ">
          <div class="card-header text-center text-light">
               <i class="fa fa-check-circle fa-2x text-success" aria-hidden="true"></i><br>
               Thank you for your payment of <br> £<?= $_SESSION['debit'] ?>
          </div>
          <div class="card ml-auto mr-auto" style="width: 19rem; margin-top:-2%">
               <div class=" card-body">
                    <p class="card-text" style="font-size: 13px;">Account Name: <span class="ml-auto"><?= $_SESSION['surname'] . " " . $_SESSION['otherName'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Account Number: <span class="ml-auto"><?= $_SESSION['accountNumber'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Account Type: <span class="ml-auto"><?= $_SESSION['accountType'] ?></span></p>
                    <hr>
                    <h5>Receiver</h5>
                    <p class="card-text" style="font-size: 13px;">Name: <span class="ml-auto"><?= $_SESSION['receiverName'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Account Number: <span class="ml-auto"><?= $_SESSION['receiverNumber'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Amount: <span class="ml-auto"><?= $_SESSION['debit'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Remarks: <span class="ml-auto"><?= $_SESSION['narration'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Bank Name: <span class="ml-auto"><?= $_SESSION['bankName'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">Bank Address: <span class="ml-auto"><?= $_SESSION['bankAddress'] ?></span></p>
                    <p class="card-text" style="font-size: 13px;">BIC Code (Swift):: <span class="ml-auto"><?= $_SESSION['$swiftCode '] ?></span></p>
                    <div class="ml-auto">
                         <a href="index.php" style="background-color: darkblue; color:white" class="btn btn-block">Home</a>
                    </div>
               </div>
          </div>
     </div>

     </div>
     </div>

     <?php require_once("./dashboard-footer.php") ?>