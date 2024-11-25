<?php
$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");

require_once("dashbord-header.php");

$sql = "Select * from `users` WHERE id = $id";
$result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
if ($result) {
     $surname = $result['surname'];
     $otherName = $result['otherName'];
     $address = $result['address'];
     $city = $result['city'];
     $dateOfBirth = $result['dateOfBirth'];
     $gender = $result['gender'];
     $state = $result['state'];
     $phone = $result['phone'];
     $email = $result['email'];
     $country = $result['country'];
     $idCard = $result['idCard'];
     $idNumber = $result['idNumber'];
     $username = $result['username'];
     $password = $result['password'];
     $transferCode = $result['transferCode'];
     $accountNumber = $result['accountNumber'];
     $balance = $result['balance'];
     $accountType = $result['accountType'];
     $image = "./" . $result['imageUrl'];
     $isBan = $result['isBan'];
     $isDisapprove = $result['isDisapprove'];
     $isDisable = $result['isDisable'];
     $isShow = $result['isShow'];
     $suspicious = $result['suspicious'];
} else {
     die("Sorry you don't have permission to view this page");
}

?>
<style>
     body {
          overflow-x: hidden;
     }
</style>


<div class="container">
     <h6>
          Account Statement
     </h6>
     <hr>
     <div class="row">
          <style>
               .indicator {
                    display: inline-block;
                    width: 10px;
                    height: 10px;
                    border-radius: 50%;
               }

               .indicator.active {
                    background: green;
               }

               .indicator.inactive {
                    background: red;
               }
          </style>
          <div class="col-md-6">
               <table class="table">
                    <tbody>
                         <tr>
                              <td>Surname</td>
                              <td><?= $surname ?></td>
                         </tr>
                         <tr>
                              <td>Other Names</td>
                              <td><?= $otherName ?></td>
                         </tr>
                         <tr>
                              <td>Email</td>
                              <td><?= $email ?></td>
                         </tr>
                         <tr>
                              <td>Phone</td>
                              <td><?= $phone ?></td>
                         </tr>
                         <tr>
                              <td>Address</td>
                              <td><?= $address ?></td>
                         </tr>
                         <tr>
                              <td>City</td>
                              <td><?= $city ?></td>
                         </tr>
                         <tr>
                              <td>State</td>
                              <td><?= $state ?></td>
                         </tr>
                         <tr>
                              <td>Country</td>
                              <td><?= $country ?></td>
                         </tr>
                         <!-- <tr>
						<td>Access Code</td>
						<td>28871</td>
					</tr> -->
                         <tr>
                              <td>Transfer Pin</td>
                              <td><?= $transferCode ?> </td>
                         </tr>
                         <!-- <tr>
						<td>Transfer Token</td>
						<td></td>
					</tr> -->
                    </tbody>
               </table>
          </div>
          <div class="col-md-6">
               <label class="cabinet center-block" style="width: 160px; height: 200px">
                    <figure class="clear-margin">
                         <img src="<?= $image ?>" class="gambar img-responsive img-thumbnail" id="item-img-output" style="width: 160px; height: 200px">
                         <figcaption><i class="fa fa-camera"></i></figcaption>
                    </figure>
               </label>
               <table class="table">
                    <tbody>
                         <tr>
                              <td>Username</td>
                              <td><?= $username ?></td>
                         </tr>
                         <tr>
                              <td>Password</td>
                              <td><?= $password ?></td>
                         </tr>
                         <tr>
                              <td>ID Card Number</td>
                              <td><?= $idCard ?></td>
                         </tr>
                         <tr>
                              <td>Account Type</td>
                              <td> <?= $accountType ?></td>
                         </tr>
                         <tr>
                              <td>Account Number</td>
                              <td><?= $accountNumber ?></td>
                         </tr>
                         <tr>
                              <td>Account Access</td>
                              <td>
                                   <?php
                                   if ($isBan == true) {
                                   ?>
                                        <span class="indicator active bg-danger"></span>Ban
                                   <?php
                                   } else {
                                   ?>
                                        <span class="indicator active"></span>Activated
                                   <?php
                                   }
                                   ?>

                              </td>
                         </tr>
                         <tr>
                              <td>Account Status</td>
                              <td>
                                   <?php
                                   if ($isDisapprove) {
                                   ?>
                                        <span class="indicator active bg-danger"></span>Inactive
                                   <?php
                                   } else {
                                   ?>
                                        <span class="indicator active"></span>Active
                                   <?php
                                   }
                                   ?>
                              </td>
                         </tr>
                         <tr>
                              <td>Account Balance</td>
                              <td><?= number_format($balance) ?></td>
                         </tr>
                    </tbody>
               </table>
               <div class="text-center mt-1">
                    <a href="ban-customer.php?id=<?= $id ?>" class="waves-effect btn-large">
                         <?php
                         if ($isBan == true) {
                              print_r("Activate Customer");
                         } else {
                              print_r('Ban Customer');
                         }
                         ?>
                    </a>
               </div>
               <div class="text-center mt-1">
                    <a href="suspicious.php?id=<?= $id ?>" class="waves-effect btn-large">
                         <?php
                         if ($suspicious == true) {
                              print_r("Don't Suspect");
                         } else {
                              print_r('Suspect An Account');
                         }
                         ?>
                    </a>
               </div>
               <div class="text-center mt-1">
                    <a href="disapprove-customer.php?id=<?= $id ?>" class="waves-effect btn-large">
                         <?php
                         if ($isDisapprove == true) {
                              print_r("Approve Customer");
                         } else {
                              print_r('Disapprove Customer');
                         }
                         ?>
                    </a>
               </div>
               <div class="text-center mt-1">
                    <a href="disable-customer-transfer.php?id=<?= $id ?>" class="waves-effect btn-large">
                         <?php
                         if ($isDisable) {
                              print_r("Approve Customer Transfer");
                         } else {
                              print_r('Disable Customer Transfer');
                         }
                         ?>
                    </a>
               </div>
               <div class="text-center mt-1">
                    <a href="show-active.php?id=<?= $id ?>" class="waves-effect btn-large">
                         <?php
                         if ($isShow) {
                              print_r('Hide Activeness in user dashboard');
                         } else {
                              print_r("Show Activeness in user dashboard");
                         }
                         ?>
                    </a>
               </div>
               <div class="text-center mt-1">
                    <a href="#" type="button" data-toggle="modal" data-target="#exampleModal">Credit Customer</a> | <a href="#" type="button" data-toggle="modal" data-target="#exampleModal1">Debit Customer</a> | <a href="edit-customer.php?id=<?= $id ?>">Edit Customer</a> | <a href="statement.php?id=<?= $email ?>">Statement</a>
               </div>
          </div>
     </div>
</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Credit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form class="row g-3" action="send.inc.php?id=<?= $id ?>" method="POST">
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Amount</label>
                              <input type="Number" class="form-control" name="amount" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Narration</label>
                              <input type="text" class="form-control" name="narration" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Date</label>
                              <input type="date" class="form-control" name="date" id="inputEmail4" required>
                         </div>
                         <div class="col-12 mt-3 text-center">
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

<!-- debit modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Debit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form class="row g-3" action="debit.php?id=<?= $id ?>" method="POST">
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Amount</label>
                              <input type="Number" class="form-control" name="amount" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Narration</label>
                              <input type="text" class="form-control" name="narration" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Date</label>
                              <input type="date" class="form-control" name="date" id="inputEmail4" required>
                         </div>
                         <div class="col-12 mt-3 text-center">
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



<?php require_once("dashboard-footer.php") ?>