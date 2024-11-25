<?php
require_once("dashbord-header.php");
$id = htmlspecialchars($_GET['id']);

if (!$id) die("Sorry you don't have permission to view this page");
?>

<div class="container">
     <h6>
          Account Statement
     </h6>
     <hr>


     <?php
     $sql = "Select * from `statement` WHERE id='$id'";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
               $date = $row['date'];
               $narration = $row['narration'];
               $credit = $row['credit'];
               $debit = $row['debit'];
               $balance = $row['balance'];
               $status = $row['status'];
               $email = $row['email'];
               // Convert date format if needed
               $date = date('Y-m-d', strtotime($date));
     ?>

               <div>
                    <form class="row g-3" action="edit-statement.php?id=<?= $id ?>" method="POST">
                         <?php
                         if ($credit > 0) {
                         ?>
                              <div class="col-md-12">
                                   <label for="inputEmail4" class="form-label">Amount</label>
                                   <input type="Number" class="form-control" name="amount" value="<?= $credit ?>" id="inputEmail4" required>
                              </div>
                         <?php
                         } else {
                         ?>
                              <div class="col-md-12">
                                   <label for="inputEmail4" class="form-label">Amount</label>
                                   <input type="Number" class="form-control" name="amount" value="<?= $debit ?>" id="inputEmail4" required>
                              </div>
                         <?php
                         }
                         ?>
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
                         <div class="col-md-12 d-none">
                              <label for="inputEmail4" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" value="<?= $email ?>" id="inputEmail4">
                         </div>
                         <div class="col-md-12 d-none">
                              <label for="inputEmail4" class="form-label">Debit</label>
                              <input type="number" class="form-control" name="debit" value="<?= $debit ?>" id="inputEmail4">
                         </div>
                         <div class="col-md-12 d-none">
                              <label for="inputEmail4" class="form-label">Credit</label>
                              <input type="number" class="form-control" name="credit" value="<?= $credit ?>" id="inputEmail4">
                         </div>
                         <div class="col-12 mt-3 text-center">
                              <button type="submit" name="send" class="btn btn-primary">Send</button>
                         </div>
                    </form>
               </div>
     <?php
          }
     } ?>

</div>







<?php require_once("dashboard-footer.php") ?>