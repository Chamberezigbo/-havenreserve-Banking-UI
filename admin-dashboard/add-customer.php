<?php require_once("dashbord-header.php") ?>

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



     <h5>Add User</h5>
     <hr>
     <form action="register-user.inc.php" method="post" name="registration" autocomplete="off" enctype="multipart/form-data">
          <h6>1. Personal Information</h6>
          <hr>
          <!-- personal detail form  -->
          <div class="row">
               <div class="col">
                    <div class="form-group form-control-sm">
                         <label for="surname">Surname*</label>
                         <input type="text" class="form-control form-control-sm" id="surname" name="surname" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="otherName">Other Names*</label>
                         <input type="text" class="form-control form-control-sm" id="otherName" name="otherName" autocapitalize="none" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="dateOfBirth">Date of Birth*</label>
                         <input type="date" class="form-control form-control-sm" id="dateOfBirth" name="dateOfBirth" autocapitalize="none">
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="gender">Gender*</label>
                         <select class="form-control form-control-sm" id="gender" name="gender">
                              <option value="default">Gender</option>
                              <option value="female">Female</option>
                              <option value="male">Male</option>
                         </select>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="phone">Phone</label>
                         <input type="number" class="form-control form-control-sm" id="phone" name="phone" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="email">Email address</label>
                         <input type="email" class="form-control form-control-sm" id="email" name="email" aria-describedby="emailHelp" autocapitalize="none" required>
                         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
               </div>

               <div class="col">

                    <div class="form-group form-control-sm">
                         <label for="address" class="form-control-sm">Residential Address*</label>
                         <textarea class=" form-control form-control-sm" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="city">City</label>
                         <input type="text" class="form-control form-control-sm" id="city" name="city" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="state" class="form-control-sm">State*</label>
                         <input type="text" class="form-control form-control-sm" id="state" name="state" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="zip" class="form-control-sm">Zip Code*</label>
                         <input type="text" class="form-control form-control-sm" id="zip" name="zipCode" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="country" class="form-control-sm">Country*</label>
                         <input type="text" class="form-control form-control-sm" id="country" name="country" required>
                    </div>
               </div>
          </div>
          <div class="d-flex justify-content-center">
               <div class="form-group">
                    <i class="fas fa-user fa-6x ml-5 mb-2"></i>
                    <input type="file" class="form-control-file" id="image" name="fileToUpload" required>
               </div>
          </div>

          <h6>2. Identification & Know Your Customers</h6>
          <hr>
          <!-- identification section -->
          <div class="row">
               <div class="col">
                    <div class="form-group form-control-sm">
                         <label for="idCard">Type Of ID Card*</label>
                         <input type="text" class="form-control form-control-sm" id="idCard" name="idCard" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="idNumber">ID Card Number*</label>
                         <input type="text" class="form-control form-control-sm" id="idNumber" name="idNumber" required>
                    </div>
               </div>

               <div class="col">
                    <div class="form-group form-control-sm">
                         <label for="occupation">Occupation*</label>
                         <input type="text" class="form-control form-control-sm" id="occupation" name="occupation" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="turnover">Annual Turnover*</label>
                         <input type="number" class="form-control form-control-sm" id="turnover" name="turnover" required>
                    </div>
               </div>
          </div>

          <h6>3. Account Information</h6>
          <hr>
          <!-- Account Information -->
          <div class="row">
               <div class="col">
                    <div class="form-group form-control-sm">
                         <label for="exampleInputPassword1">Branch*</label>
                         <select class="form-control form-control-sm" id="branch" name="branch">
                              <option value="default">Branch ....</option>
                              <option value="USA">USA</option>
                              <option value="Canada">Canada</option>
                              <option value="Europe">Europe</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Asia">Asia</option>
                              <option value="Australia">Australia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Middle East">Middle East</option>
                              <option value="others">Others</option>
                         </select>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="exampleInputPassword1">Account Type*</label>
                         <select class="form-control form-control-sm" id="accountType" name="accountType">
                              <option>Type</option>
                              <option>Savings Account</option>
                              <option>Current Account</option>
                              <option>Business Account</option>
                              <option>Checking Account</option>
                              <option>Fixed Account</option>
                              <option>Crypto Current Account</option>
                              <option>Non Resident Savings Account</option>
                              <option>Cooperate Business Account</option>
                              <option>Investment Account</option>
                         </select>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="deposit">Initial Deposit*</label>
                         <input type="number" class="form-control form-control-sm" id="deposit" name="deposit" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="currency">Currency*</label>
                         <select class="form-control form-control-sm" id="currency" name="currency">
                              <option value="default">Currency</option>
                              <option value="USD">USD</option>
                              <option value="EUR">EUR</option>
                              <option value="GBP">GBP</option>
                              <option value="YEN">YEN</option>
                         </select>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="username">Username*</label>
                         <input type="text" class="form-control form-control-sm" id="username" name="username" required autocapitalize="none">
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="password">Password</label>
                         <input type="password" class="form-control form-control-sm" id="password" name="password" required>
                    </div>
                    <div class="form-group form-control-sm">
                         <label for="confirmPass">Repeat Password*</label>
                         <input type="password" class="form-control form-control-sm" id="confirmPass" name="confirmPass" required>
                    </div>
               </div>

               <div class="col-lg-6 col-md-12">
                    <h5>Declaration</h5>
                    <p>
                         I here by declare that all information provided above are true and updated. <br> <br>

                         I am also aware that if in anyway I was found guilty of information falsification, the bank reserves the right to freeze my account and report such to the necessary authority.
                    </p>
                    <div class="form-group form-check">
                         <input type="checkbox" class="form-check-input" id="exampleCheck1">
                         <label class="form-check-label" for="exampleCheck1">I Agree</label>
                    </div>
               </div>
          </div>
          <div class="d-flex justify-content-center">
               <button type="submit" name="register" class="btn btn-primary">Submit</button>
          </div>

     </form>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <div id='image-cropper-result'><img style='width:120px;height:120px;'></div>
          </div>
     </div>
</div>
<?php require_once("dashboard-footer.php") ?>