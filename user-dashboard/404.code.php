          <!DOCTYPE html>
          <html>

          <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">

               <title>havenreserve Bank</title>

               <!-- Bootstrap CSS CDN -->
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
               <!-- Our Custom CSS -->
               <link rel="stylesheet" href="../css/mycss.css?v=<?php echo time(); ?>">

               <!-- Font Awesome JS -->
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
               <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

          </head>

          <body>

               <div class="container">
                    <div class="alert2 bg-light">
                         <div class="card-header text-center">
                              <i class="fas fa-window-close fa-2x text-danger"></i><br>
                              <h2>TRANSFER FAILED</h2>
                              <p>
                                   Oops! You cannot make a transfer due to your Giro bank account activation issue. Contact your nearest branch for
                                   assistance or write to our customer service for help.

                                   customerservice@giros.uk & Girobank@mail.com
                              </p>
                              <div class="ml-auto">
                                   <a href="index.php" style="background-color: darkblue; color:white" class="btn btn-block">Ok</a>
                              </div>
                         </div>
                    </div>
               </div>
          </body>
          <?php require_once("./dashboard-footer.php") ?>