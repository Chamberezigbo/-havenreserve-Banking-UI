<?php require_once("dashbord-header.php"); ?>

<div class="container">
     <!-- alert for error -->
     <?php if (isset($_SESSION['error']) &&  $_SESSION['error'] == 1) { ?>
          <div class="alert alert-warning alert-dismissible fade show w-25 ml-auto" role="alert" id="alertActivation">
               <strong>
                    <?php echo $_SESSION['errorMassage']; ?>
                    <?php $_SESSION['error'] = 0   ?>
               </strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
          </div>

     <?php } ?>

     <div class="text-center">
          <div class="d-grid gap-2 d-md-block">
               <button class="btn btn-transfer btn-lg mt-3 w-50" type="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-share"></i><br>
                    <span>Direct Transfer</span>
               </button>
               <button class="btn btn-transfer btn-lg mt-3 w-50" type="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-paper-plane"></i><br>
                    <span>International <br> Transfer</span>
               </button>
               <button class="btn btn-transfer btn-lg mt-3 w-50" type="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-share-square"></i><br>
                    <span>Beneficiary <br> Transfer</span>
               </button>
          </div>
     </div>
     <!-- Modal1-->
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Transfer Section</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <form class="row g-3" action="send.inc.php" method="POST">
                              <div class="col-md-6">
                                   <label for="inputEmail4" class="form-label">Amount</label>
                                   <input type="Number" class="form-control" name="amount" id="inputEmail4" required>
                              </div>
                              <div class="col-md-6">
                                   <label for="inputPassword4" class="form-label">Account Number</label>
                                   <input type="number" name="accountNumber" class="form-control" id="inputPassword4" placeholder="Enter Destination Account" required>
                              </div>
                              <div class="col-12 mt-3">
                                   <button type="submit" name="send" class="btn btn-primary">Send</button>
                              </div>
                         </form>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>

</div>



<?php require_once('dashboard-footer.php'); ?>