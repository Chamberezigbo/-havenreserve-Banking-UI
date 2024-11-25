<?php
require_once("db.php");
error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
     session_start();
}
if (!$_SESSION['auth']) {
     header('location:../index.php');
} else {
     $currentTime = time();
     if ($currentTime > $_SESSION['expire']) {
          session_unset();
          session_destroy();
          header('location:index.php');
     } else {
?>
          <!DOCTYPE html>
          <html>

          <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <title>Home › Blue Ridge Bank and Trust Co.</title>
               <meta name="description" content="" />
               <meta name="keywords" content="" />
               <meta name="viewport" content="width=device-width,initial-scale=1" />

               <!-- Font Awesome JS -->
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
               <script src="https://jsuites.net/v4/jsuites.js"></script>
               <script src="https://jsuites.net/v4/jsuites.layout.js"></script>
               <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
               <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.layout.css" type="text/css" />


               <!-- Bootstrap CSS CDN -->
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
               <!-- Our Custom CSS -->
               <link rel="stylesheet" href="../assets/css/mycss.css?v=<?php echo time(); ?>">

          </head>

          <body>

               <div class="wrapper">
                    <!-- Sidebar  -->
                    <nav id="sidebar">
                         <div class="sidebar-header">
                              <h5>Ridge Bank</h5>
                              <strong>RB</strong>
                         </div>

                         <ul class="list-unstyled components">
                              <li class="">
                                   <a href="index.php">
                                        <i class="fas fa-home"></i>
                                        Dashboard
                                   </a>
                              </li>
                              <li>
                                   <a href="add-customer.php">
                                        <i class="fas fa-copy"></i>
                                        Add Client
                                   </a>
                              </li>
                              <li>
                                   <a href="./all-user.php">
                                        <i class="fas fa-image"></i>
                                        All Customers
                                   </a>
                              </li>
                              <li>
                                   <a href="#">
                                        <i class="fas fa-question"></i>
                                        Profile
                                   </a>
                              </li>
                              <li>
                                   <a href="requisitions.php">
                                        <i class="fas fa-paper-plane"></i>
                                        Account Requisition
                                   </a>
                              </li>
                              <li>
                                   <a href="change-password.php">
                                        <i class="fas fa-paper-plane"></i>
                                        Change Password
                                   </a>
                              </li>
                              <li>
                                   <a href="user-manual.php">
                                        <i class="fas fa-paper-plane"></i>
                                        User Guide
                                   </a>
                                   <a href="add-old-customer.php">
                                        <i class="fas fa-copy"></i>
                                        Add Old Client
                                   </a>
                              </li>
                              <li>
                                   <a href="logout.php">
                                        <i class="fas fa-paper-plane"></i>
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

                                   <button type="button" id="sidebarCollapse" class="btn btn-info">
                                        <i class="fas fa-align-left"></i>
                                        <span>Toggle Sidebar</span>
                                   </button>

                                   <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <img src="../images/aiony-haust-3TLl_97HNJo-unsplash.jpg" class="img-thumbnail" alt="..." width="35">
                                   </button>

                                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="nav navbar-nav ml-auto">
                                             <li class="nav-item active">
                                                  <a class="nav-link" href="#">
                                                       <h5>Business Account</h5>
                                                       <span class="text-muted p">Balance</span>
                                                       <span class="text-success p">
                                                            :GBP 1,407,962.00
                                                       </span>
                                                  </a>
                                             </li>
                                        </ul>
                                   </div>
                                   <div id="google_translate_element"></div>
                              </div>
                         </nav>

               <?php
          }
     }
               ?>