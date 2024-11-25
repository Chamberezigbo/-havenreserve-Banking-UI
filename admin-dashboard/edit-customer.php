<?php
session_start();
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
     $occupation = $result['occupation'];
     $turnover = $result['annualTurnover'];
     $idNumber = $result['idNumber'];
     $idCard = $result['idCard'];
     $zipCode = $result['zipCode'];
} else {
     die("Sorry you don't have permission to view this page");
}

if (isset($_POST['register'])) {
     $surname = trim($_POST['surname']);
     $otherName = trim($_POST['otherName']);
     $dateOfBirth = trim($_POST['dateOfBirth']);
     $gender = trim($_POST['gender']);
     $phone = trim($_POST['phone']);
     $email = trim($_POST['email']);
     $address = trim($_POST['address']);
     $city = trim($_POST['city']);
     $state = trim($_POST['state']);
     $zipCode = trim($_POST['zipCode']);
     $country = trim($_POST['country']);
     $idCard = trim($_POST['idCard']);
     $idNumber = trim($_POST['idNumber']);
     $occupation = trim($_POST['occupation']);
     $turnover = trim($_POST['turnover']);
     $branch = trim($_POST['branch']);
     $accountType = trim($_POST['accountType']);
     $deposit = trim($_POST['deposit']);
     $currency = trim($_POST['currency']);
     $username = $_POST['username'];
     $password = $_POST['password'];
     $imageUrl = " ";

     //? file upload code //
     $target_dir = "uploads/";
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake image
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if ($check !== false) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] =
               "File is an image - " . $check["mime"] . ".";
          header("Location:index.php");
          $uploadOk = 1;
     } else {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "file is not an image";
          header("Location:index.php");
          $uploadOk = 0;
     }
     // Check if file already exists
     if (file_exists($target_file)) {
          $sql2 = "UPDATE users
          SET surname = '$surname',
           otherName = '$otherName',
           address = '$address',
           dateOfBirth = '$dateOfBirth',
           gender = '$gender' ,
           phone = '$phone',
           email = '$email',
           city = '$city',
           state = '$state',
           zipCode = '$zipCode',
           country = '$country',
           idCard = '$idCard',
           idNumber = '$idNumber',
           occupation = '$occupation',
           annualTurnover = '$turnover',
           branch = '$branch',
           accountType = '$accountType',
           balance = '$deposit',
           currency = '$currency',
           username = '$username',
           password = '$password',
          WHERE id = $id";
          $result = mysqli_query($conn, $sql2);
          if ($result) {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = "Successfully uploaded a file.";
               $uploadOk = 1;
               header("Location:index.php");
          } else {
               echo (mysqli_error($conn));
               header("Location:index.php?error=mysqli_error");
          }
     }

     // Check file size
     if ($_FILES["fileToUpload"]["size"] > 10000000) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "Sorry, your file is too large.";
          $uploadOk = 0;
     }

     // Allow certain file formats
     if (
          $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif"
     ) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
     }

     // Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
          $_SESSION['error'] = 1;
          $_SESSION['errorMassage'] = "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
     } else {
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
          $sql2 = "UPDATE users
          SET surname = '$surname',
           otherName = '$otherName',
           address = '$address',
           dateOfBirth = '$dateOfBirth',
           gender = '$gender' ,
           phone = '$phone',
           email = '$email',
           city = '$city',
           state = '$state',
           zipCode = '$zipCode',
           country = '$country',
           idCard = '$idCard',
           idNumber = '$idNumber',
           occupation = '$occupation',
           annualTurnover = '$turnover',
           branch = '$branch',
           accountType = '$accountType',
           balance = '$deposit',
           currency = '$currency',
           username = '$username',
           password = '$password',
           imageUrl = '$target_file'
          WHERE id = $id";
          $result = mysqli_query($conn, $sql2);
          if ($result) {
               $_SESSION['error'] = 1;
               $_SESSION['errorMassage'] = "Successfully uploaded a file.";
               $uploadOk = 1;
               header("Location:./index.php");
          } else {
               echo (mysqli_error($conn));
               header("Location:index.php?error=mysqli_error");
          }
     }
}
?>
<h5>Edit User</h5>
<hr>
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

<form action="#" method="post" name="registration" autocomplete="off" enctype="multipart/form-data">
     <h6>1. Personal Information</h6>
     <hr>
     <!-- personal detail form  -->
     <div class="row">
          <div class="col">
               <div class="form-group form-control-sm">
                    <label for="surname">Surname*</label>
                    <input type="text" class="form-control form-control-sm" id="surname" value="<?= $surname ?>" name="surname" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="otherName">Other Names*</label>
                    <input type="text" class="form-control form-control-sm" id="otherName" value="<?= $otherName ?>" name="otherName" autocapitalize="none" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="dateOfBirth">Date of Birth*</label>
                    <input type="date" class="form-control form-control-sm" value="<?= $dateOfBirth ?>" id="dateOfBirth" name="dateOfBirth" autocapitalize="none">
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
                    <input type="number" class="form-control form-control-sm" value="<?= $phone ?>" id="phone" name="phone" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control form-control-sm" value="<?= $email ?>" id="email" name="email" aria-describedby="emailHelp" autocapitalize="none" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div>
          </div>

          <div class="col">

               <div class="form-group form-control-sm">
                    <label for="address" class="form-control-sm">Residential Address*</label>
                    <input class=" form-control form-control-sm" id="address" value="<?= $address ?>" name="address" rows="3"></input>
               </div>
               <div class="form-group form-control-sm">
                    <label for="city">City</label>
                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="<?= $city ?>" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="state" class="form-control-sm">State*</label>
                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="<?= $state ?>" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="zip" class="form-control-sm">Zip Code*</label>
                    <input type="text" class="form-control form-control-sm" id="zip" name="zipCode" value="<?= $zipCode ?>" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="country" class="form-control-sm">Country*</label>
                    <input type="text" class="form-control form-control-sm" id="country" name="country" value="<?= $country ?>" required>
               </div>
          </div>
     </div>
     <div class="d-flex justify-content-center">
          <div class="form-group">
               <i class="fas fa-user fa-6x ml-5 mb-2"></i>
               <label for="state" class="form-control-sm text-danger">Select a picture for your update to be successful</label>
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
                    <input type="text" class="form-control form-control-sm" id="idCard" name="idCard" value="<?= $idCard ?>" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="idNumber">ID Card Number*</label>
                    <input type="text" class="form-control form-control-sm" value="<?= $idNumber ?>" id="idNumber" name="idNumber" required>
               </div>
          </div>

          <div class="col">
               <div class="form-group form-control-sm">
                    <label for="occupation">Occupation*</label>
                    <input type="text" class="form-control form-control-sm" id="occupation" value="<?= $occupation ?>" name="occupation" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="turnover">Annual Turnover*</label>
                    <input type="text" class="form-control form-control-sm" id="turnover" value="<?= $turnover ?>" name="turnover" required>
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
                    <input type="number" class="form-control form-control-sm" id="deposit" name="deposit" value="<?= $balance ?>" required>
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
                    <input type="text" class="form-control form-control-sm" id="username" value="<?= $username ?>" name="username" required autocapitalize="none">
               </div>
               <div class="form-group form-control-sm">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-sm" id="password" value="<?= $password ?>" name="password" required>
               </div>
               <div class="form-group form-control-sm">
                    <label for="confirmPass">Repeat Password*</label>
                    <input type="password" class="form-control form-control-sm" id="confirmPass" name="confirmPass" value="<?= $password ?>" required>
               </div>
          </div>
     </div>
     <div class="d-flex justify-content-center">
          <button type="submit" name="register" class="btn btn-primary">Submit</button>
     </div>

</form>
</div>

<?php require_once("dashboard-footer.php") ?>