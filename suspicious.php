<?php require_once('./header.php'); ?>
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Our Custom CSS -->
<link rel="stylesheet" href="../css/mycss.css?v=<?php echo time(); ?>">

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

<body>

     <div class="container" style="margin-top: 15%; margin-bottom:5%;">


          <div class="alert2 bg-light">
               <div class="card-header text-center">
                    <i class="fas fa-window-close fa-2x text-danger"></i><br>
                    <h2>ATTENTION PLEASE</h2>
                    <p>
                         Due to suspicious activity, we have
                         temporarily blocked your Blue Ridge
                         account.please contact our
                         support team via email
                         info@blueridgebktrust.com
                    </p>
                    <div class="ml-auto">
                         <a href="index.php" style="background-color: darkblue; color:white" class="btn btn-block">Ok</a>
                    </div>
               </div>
          </div>
     </div>

     <?php require_once("footer.php") ?>