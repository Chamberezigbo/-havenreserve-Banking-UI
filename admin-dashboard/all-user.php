<?php require_once("dashbord-header.php") ?>

<style>
     body {
          overflow-x: hidden;
     }
</style>


<div class="container">
     <!-- alert for error -->
     <?php
     if (isset($_SESSION['error']) &&  $_SESSION['error'] == 1) { ?>
          <div class="alert alert-warning alert-dismissible fade show w-100" role="alert" id="alertActivation">
               <strong>
                    <?php echo $_SESSION['errorMassage']; ?>
                    <?php $_SESSION['error'] = 0   ?>
               </strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
          </div>

     <?php } ?>


     <h6>
          Account Statement
     </h6>
     <hr>

     <div class="container">
          <div class="table-responsive">
               <table class="table table-sm table-hover">
                    <thead>
                         <tr>
                              <th>S/N</th>
                              <th scope="col">Fullname</th>
                              <th scope="col">Profile</th>
                              <th scope="col">Account Number</th>
                              <th scope="col">Last Seen</th>
                              <th scope="col">Country</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php
                         $sql = "Select * from `users`";
                         $result = mysqli_query($conn, $sql);
                         if ($result) {
                              $id = 1;
                              while ($row = mysqli_fetch_assoc($result)) {
                                   $recordId = $row['id'];
                                   $fullname = $row['surname'] . ' ' . $row['otherName'];
                                   $lastSeen = $row['lastSeen'];
                                   $country = $row['country'];
                                   $accountNumber = $row['accountNumber'];
                         ?>
                                   <tr>
                                        <td><?= $id ?></td>
                                        <td><?= $fullname ?></td>
                                        <td> <a href='view_profile.php?id=<?= $recordId ?> '>View Profile</a></td>
                                        <td><?= $accountNumber ?></td>
                                        <td><?php
                                             if ($lastSeen == "") {
                                                  print_r('Never Logged In');
                                             } else {
                                                  print_r($lastSeen);
                                             }
                                             ?></td>
                                        <td><?= $country ?></td>
                                        <td> <a class="text-danger" href='delete.php?id=<?= $recordId ?> '>Delete</a></td>
                                   </tr>
                         <?php $id++;
                              }
                         } ?>
                    </tbody>
               </table>

          </div>

     </div>
</div>


<?php require_once("dashboard-footer.php") ?>