<?php require_once("dashbord-header.php") ?>


<div class="table-responsive-sm">
     <table class=" table table-striped ">
          <?php
          $id = $_SESSION['sessionId'];
          $sql = "Select * from `users` WHERE id=$id";
          $result = mysqli_query($conn, $sql);
          if ($result) {
               $num = 0;
               while ($row = mysqli_fetch_assoc($result)) {
                    $surname = $row['surname'];
                    $otherName = $row['otherName'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $dateOfBirth = $row['dateOfBirth'];
                    $gender = $row['gender'];
                    $state = $row['state'];
                    $phone = $row['phone'];
                    $zipCode = $row['zipCode'];
                    $email = $row['email'];
                    $country = $row['country'];
                    $idCard = $row['idCard'];
                    $idNumber = $row['idNumber'];
                    $annualTurnover = $row['annualTurnover'];
                    $accountType = $row['accountType'];
                    $balance = $row['balance'];
                    $username = $row['username'];
                    $occupation = $row['occupation'];
                    $currency = $row['currency'];
                    $accountNumber = $row['accountNumber'];
                    $transferCode = $row['transferCode'];
                    $imageUrl = $row['imageUrl'];
          ?>
                    <thead>
                         <tr>
                              <th scope=" col">Full-name</th>
                              <td><?= strtoupper($surname)  ?></td>
                              <td><?= strtoupper($otherName) ?></td>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <th>Address</th>
                              <td><?= $address ?></td>
                         </tr>
                         <tr>
                              <th>City</th>
                              <td><?= $city ?></td>
                         </tr>
                         <tr>
                              <th>Date of birth</th>
                              <td><?= $dateOfBirth ?></td>
                         </tr>
                         <tr>
                              <th>Gender</th>
                              <td><?= $gender ?></td>
                         </tr>
                         <tr>
                              <th>State</th>
                              <td><?= $state ?></td>
                         </tr>
                         <tr>
                              <th>Phone</th>
                              <td><?= $phone ?></td>
                         </tr>
                         <tr>
                              <th>ZipCode</th>
                              <td><?= $zipCode ?></td>
                         </tr>
                         <tr>
                              <th>Email</th>
                              <td><?= $email ?></td>
                         </tr>
                         <tr>
                              <th>Country</th>
                              <td><?= $country ?></td>
                         </tr>
                         <tr>
                              <th>Id Card</th>
                              <td><?= $idCard ?></td>
                         </tr>
                         <tr>
                              <th>Annual Turnover</th>
                              <td><?= $annualTurnover ?></td>
                         </tr>
                         <tr>
                              <th>Account Type</th>
                              <td><?= $accountType ?></td>
                         </tr>
                         <tr>
                              <th>Ballance</th>
                              <td><?= $balance ?></td>
                         </tr>
                         <tr>
                              <th>Username</th>
                              <td><?= $username ?></td>
                         </tr>
                         <tr>
                              <th>Occupation</th>
                              <td><?= $occupation ?></td>
                         </tr>
                         <tr>
                              <th>Currency</th>
                              <td><?= $currency ?></td>
                         </tr>
                         <tr>
                              <th>Account Number</th>
                              <td><?= $accountNumber ?></td>
                         </tr>
                    </tbody>
          <?php }
          } ?>
     </table>
</div>




<?php require_once("dashboard-footer.php") ?>