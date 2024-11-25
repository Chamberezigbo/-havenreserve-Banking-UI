<?php
//check if session is started already
if (session_status() === PHP_SESSION_NONE) session_start();

require_once("db.php");
error_reporting(0);
$image = "../admin-dashboard/" . $_SESSION['image'];


if (!$_SESSION['auth']) {
     header('location:../index.php');
} else {
     $currentTime = time();
     if ($currentTime > $_SESSION['expire']) {
          session_unset();
          session_destroy();
          header('location:../index.php');
     } else {
?>
          <!DOCTYPE html>
          <html>

          <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <title>Home ›  havenreserve Bank</title>
               <meta name="description" content="" />
               <meta name="keywords" content="" />
               <meta name="viewport" content="width=device-width,initial-scale=1" />

               <!-- Bootstrap CSS CDN -->
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
               <!-- Our Custom CSS -->
               <link rel="stylesheet" href="../assets/css/mycss.css?v=<?php echo time(); ?>">

               <!-- Font Awesome JS -->
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
               <script src="../assets/js/validate.js"></script>

          </head>

          <style>
               .list-group-item a {
                    font-size: 12px;
               }
          </style>

          <body>

               <div class="wrapper">
                    <!-- Sidebar  -->
                    <nav id="sidebar">
                         <div class="sidebar-header">
                              <h5><?= $_SESSION['surname']; ?></h5>
                              <strong><?= substr($_SESSION['otherName'], 0, 2);  ?></strong>
                         </div>

                         <ul class="list-unstyled components">
                              <li class="">
                                   <a href="index.php">
                                        <i class="fas fa-home"></i>
                                        Dashboard
                                   </a>
                              </li>
                              <li>
                                   <a href="./transfer.php">
                                        <i class="fas fa-briefcase"></i>
                                        Transfer Funds
                                   </a>
                              </li>
                              <li>
                                   <a href="dashboard-profile.php">
                                        <i class="fas fa-user-circle"></i>
                                        Profile
                                   </a>
                              </li>
                              <li>
                                   <a href="requisitions.php">
                                        <i class="fas fa-id-badge"></i>
                                        Account Requisition
                                   </a>
                              </li>
                              <li>
                                   <a href="beneficiary.php">
                                        <i class="fas fa-user-plus"></i>
                                        Add Beneficiary
                                   </a>
                              </li>
                              <li>
                                   <a href="statement.php">
                                        <i class="fas fa-history"></i>
                                        Transaction History
                                   </a>
                              </li>
                              <li>
                                   <a href="change-password.php">
                                        <i class="fas fa-unlock-alt"></i>
                                        Change Password
                                   </a>
                              </li>
                              <li>
                                   <a href="user-manual.php">
                                        <i class="fas fa-skiing-nordic"></i>
                                        User Guide
                                   </a>
                              </li>
                              <li>
                                   <a href="logout.php">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                   </a>
                              </li>
                         </ul>
                         <ul class="list-unstyled CTAs">
                              <img src="../assets/img/blue-ridge-bank-and-trust-co.svg" class="img-thumbnail" alt="...">
                         </ul>

                    </nav>



                    <!-- Page Content  -->
                    <div id="content">

                         <nav class="navbar navbar-expand-lg navbar-light bg-light">
                              <div class="container-fluid">

                                   <button type="button" id="sidebarCollapse" class="btn btn-transfer">
                                        <i class="fas fa-align-left"></i>
                                        <span>Toggle Sidebar</span>
                                   </button>

                                   <div id="google_translate_element"></div>


                                   <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <img src="<?= $image ?>" class="img-thumbnail" alt="..." width="35">
                                   </button>

                                   <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="nav navbar-nav ml-auto">
                                             <li class="nav-item active">
                                                  <a class="nav-link" href="#">
                                                       <h5><?= $_SESSION['accountType'] ?></h5>
                                                       <span class="text-muted p">Balance</span>
                                                       <span class="text-success p">
                                                            :<?= $_SESSION['currency'] . " " . number_format($_SESSION['balance']) ?>
                                                       </span> <br>
                                                       <?php
                                                       if ($_SESSION['isShow']) {
                                                       ?>
                                                            <span class="text-muted p">
                                                                 <?php
                                                                 if ($_SESSION['isDisapprove']) {
                                                                 ?>
                                                                      <h6><span class="indicator active bg-danger"></span>Inactive </h6>
                                                                 <?php
                                                                 } else {
                                                                 ?>
                                                                      <h6><span class="indicator active"></span>Active </h6>
                                                                 <?php
                                                                 }
                                                                 ?>
                                                            </span>
                                                       <?php
                                                       }
                                                       ?>

                                                  </a>
                                             </li>
                                        </ul>
                                   </div> -->
                              </div>
                         </nav>

               <?php
          }
     }
               ?>