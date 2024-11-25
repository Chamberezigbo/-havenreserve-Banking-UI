<?php
require_once("dashbord-header.php");
$email = htmlspecialchars($_GET['id']);

if (!$email) die("Sorry you don't have permission to view this page");
?>
<div class="container">
     <h6>
          Account Statement
     </h6>
     <hr>

     <div class="table-responsive">
          <table class="table table-hover">
               <thead>
                    <tr>
                         <th scope="col">Date</th>
                         <th scope="col">Narration</th>
                         <th scope="col">Status</th>
                         <th scope="col">Credit</th>
                         <th scope="col">Debit</th>
                         <th scope="col">Balance</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    $sql = "Select * from `statement` WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                         while ($row = mysqli_fetch_assoc($result)) {
                              $id = $row['id'];
                              $date = $row['date'];
                              $narration = $row['narration'];
                              $credit = $row['credit'];
                              $debit = $row['debit'];
                              $balance = $row['balance'];
                              $status = $row['status'];
                    ?>
                              <tr>
                                   <td scope="row"><?= $date ?></td>
                                   <td><?= $narration ?></td>
                                   <?php
                                   if ($status) {
                                   ?>
                                        <td class="text-success">
                                             <?php
                                             print_r('Success');
                                             ?>
                                        </td>
                                   <?php
                                   } else {
                                   ?>
                                        <td class="text-danger">
                                             <?php
                                             print_r("Pending");
                                             ?>
                                        </td>
                                   <?php
                                   } ?>
                                   <td>
                                        <?php if ($credit == 0) {
                                             print_r("-");
                                        } else {
                                             print_r(number_format($credit));
                                        }  ?>
                                   </td>
                                   <td>
                                        <?php if ($debit == 0) {
                                             print_r('-');
                                        } else {
                                             print_r(number_format($debit));
                                        } ?>
                                   </td>
                                   <td><?= number_format($balance) ?></td>
                                   <td>
                                        <a href="edit-statement-form.php?id=<?= $id ?>" type="button">edit</a>
                                   </td>
                              </tr>
                         <?php }
                    } else {
                         ?>
                         <tr class="text-center">
                              <td>No statement</td>
                         </tr>
                    <?php

                    } ?>
               </tbody>
          </table>

     </div>
</div>

<!-- modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Credit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div class="modal-body">
                    <form class="row g-3" action="edit-statement.php?id=<?= $id ?>" method="POST">
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Amount</label>
                              <?php
                              if ($credit > 0) {
                              ?>
                                   <input type="Number" class="form-control" name="amount" value="<?= $credit ?>" id="inputEmail4" required>
                              <?php
                              } else {
                              ?> <input type="Number" class="form-control" name="amount" value="<?= $debit ?>" id="inputEmail4" required>
                              <?php
                              }
                              ?>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Narration</label>
                              <input type="text" class="form-control" name="narration" value="<?= $narration ?>" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Date</label>
                              <input type="date" class="form-control" name="date" value="<?= $date ?>" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12 mt-1">
                              <select id="status" name="status" class="form-control">
                                   <option value="successful">successful</option>
                                   <option value="pending">pending</option>
                              </select>
                         </div>
                         <div class="col-md-12">
                              <label for="inputEmail4" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" value="<?= $email ?>" id="inputEmail4">
                         </div>
                         <div class="col-md-12 d-none">
                              <label for="inputEmail4" class="form-label">Credit</label>
                              <input type="text" class="form-control" name="credit" value="<?= $credit ?>" id="inputEmail4" required>
                         </div>
                         <div class="col-md-12 d-none">
                              <label for="inputEmail4" class="form-label">Debit</label>
                              <input type="text" class="form-control" name="debit" value="<?= $debit ?>" id="inputEmail4" required>
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
</div> -->

<?php require_once("dashboard-footer.php") ?>