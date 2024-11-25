<?php require_once("dashbord-header.php") ?>
<style>
     /* Section Styling */
     .cards-section {
     display: flex;
     justify-content: center;
     align-items: center;
     margin: 0;
     }
     /* Credit Card Styles */
     .credit-card {
     width: 50%;
     border-radius: 15px;
     padding: 20px;
     color: #FFFFFF;
     display: flex;
     flex-direction: column;
     justify-content: space-between;
     background: linear-gradient(135deg, #6c63ff, #6246ea);
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
     }

     .credit-card p {
     color: #FFFFFF;
     }


     /* Header Section */
     .card-header {
     display: flex;
     justify-content: space-between;
     align-items: center;
     }

     .balance-info .label {
     font-size: 0.8rem;
     opacity: 0.8;
     margin-bottom: 5px;
     }

     .balance-info .balance {
     font-size: 0.9rem;
     font-weight: bold;
     }

     .chip-card {
     width: 40px;
     height: auto;
     }

     /* Card Details */
     .card-details {
     display: flex;
     justify-content: space-between;
     margin: 20px 0;
     }

     .detail .label {
     font-size: 0.5rem;
     opacity: 0.8;
     text-transform: uppercase;
     }

     .detail .value {
     font-size: 1rem;
     font-weight: 600;
     }

     /* Footer Section */
     .card-footer {
     display: flex;
     justify-content: space-between;
     align-items: center;
     border-top: 1px solid rgba(255, 255, 255, 0.2);
     padding-top: 15px;
     }

     .card-number {
     font-size: 1.2rem;
     letter-spacing: 2px;
     }

     .bank-logo {
     width: 50px;
     height: auto;
     }

     /* Styles for Recent Transactions */
     .recent-transactions {
     padding: 20px;
     }

     .card-container {
     background-color: #fff;
     padding: 20px;
     border-radius: 10px;
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
     }

     .card-container .title {
     font-size: 1.5rem;
     margin-bottom: 20px;
     color: #333;
     text-align: center;
     }

     .transaction-list {
     list-style: none;
     padding: 0;
     margin: 0;
     }

     .transaction-item {
     display: flex;
     align-items: center;
     justify-content: space-between;
     margin-bottom: 20px;
     padding: 10px;
     border-bottom: 1px solid #eee;
     transition: background-color 0.3s ease;
     }

     .transaction-item:hover {
     background-color: #f9f9f9;
     }

     .icon-container {
     width: 55px;
     height: 55px;
     display: flex;
     align-items: center;
     justify-content: center;
     border-radius: 50%;
     }

     .icon-container .icon {
     width: 30px;
     height: auto;
     }

     .transaction-content {
     display: flex;
     justify-content: space-between;
     align-items: center;
     flex-grow: 1;
     margin-left: 20px;
     }

     .transaction-content .details {
     display: flex;
     flex-direction: column;
     gap: 5px;
     }

     .transaction-title {
     font-size: 1rem;
     font-weight: bold;
     color: #333;
     }

     .transaction-date {
     font-size: 0.9rem;
     color: #888;
     }

     .transaction-amount {
     font-size: 1rem;
     font-weight: bold;
     }

    .title {
      font-size: 1.5rem;
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    /* Carousel Styles */
    .carousel {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      gap: 15px;
      padding: 10px 0;
    }

    .carousel-item {
      flex: 0 0 auto;
      scroll-snap-align: center;
      text-align: center;
      width: 100px;
      cursor: pointer;
    }

    .carousel-item img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .carousel-item .name {
      font-weight: bold;
      font-size: 0.9rem;
      color: #333;
    }

    .carousel-item .designation {
      font-size: 0.8rem;
      color: #888;
    }

    .carousel-buttons {
      display: flex;
      justify-content: space-between;
      margin: 10px 0;
    }

    .button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .button:hover {
      background-color: #0056b3;
    }

    /* Input Section */
    .send-amount-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 15px;
      margin-top: 20px;
    }

    .send-amount-container label {
      font-size: 1rem;
      color: #666;
      white-space: nowrap;
    }

    .send-amount-container input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 20px;
    }

    .send-button {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
    }

    .send-button:hover {
      background-color: #218838;
    }

     /* Media Queries for Responsiveness */
     @media (max-width: 768px) {
          .credit-card {
               width: 100%; /* Wider card on larger screens */
               height: auto;
          }
          .recent-transactions {
               padding: 10px;
          }

          .transaction-item {
               flex-direction: column;
               align-items: flex-start;
               gap: 10px;
          }

          .transaction-content {
               flex-direction: column;
               align-items: flex-start;
          }

          .transaction-amount {
               align-self: flex-end;
          }
     }


</style>

<!-- <div class="card debit-card">
     <div class="card-body">
          <div class="d-flex align-items-end flex-column">
               <h5 class="card-text ">....</h5>
          </div>
          <h5 class="card-title"><?= $_SESSION['surname'] . " " . $_SESSION['otherName'] ?></h5>
          <h5 class="card-title"><?= $_SESSION['accountType'] ?></h5>
          <h6 class="card-subtitle mb-2"><?= $_SESSION['currency'] . " " . number_format($_SESSION['balance']) ?></h6>
          <h6 class="card-text">Account Number <br>
               <span>
                    <?= $_SESSION['accountNumber'];  ?>
               </span>
          </h6>
          <a href="#" class="card-link">Credits</a>
          <a href="#" class="card-link">Debits</a>
          <?php
          if ($_SESSION['isShow']) {
          ?>
               <div class="d-flex align-items-end flex-column">
                    <?php
                    if ($_SESSION['isDisapprove']) {
                    ?>
                         <h6><span class="indicator active bg-danger"></span>Inactive </h6>
                    <?php
                    } else {
                    ?>
                         <h6><span class="indicator active"></span>Active </h6>
                    <?php
                    }
                    ?>
               </div>
          <?php
          }
          ?>

     </div>
</div> -->

<!-- Cards Section -->
<section class="cards-section">
     <div class="credit-card blue-theme">
          <div class="card-header">
               <div class="balance-info">
               <p class="label">Balance</p>
               <p class="balance"><?= $_SESSION['currency'] . " " . number_format($_SESSION['balance']) ?></p>
               </div>
               <img src="../assets/img/chip_white.png" alt="chip-card" class="chip-card">
          </div>

          <div class="card-details">
               <div class="detail">
               <p class="label">CARD HOLDER</p>
               <p class="value"><?= $_SESSION['surname'] . " " . $_SESSION['otherName'] ?></p>
               </div>
               <div class="detail">
               <p class="label">Account Type</p>
               <p class="value"><?= $_SESSION['accountType'] ?></p>
               </div>
          </div>

          <div class="card-footer">
               <?php
                    // Assuming $_SESSION['accountNumber'] contains the full account number
                    $accountNumber = $_SESSION['accountNumber'];

                    // Format the account number
                    $formattedAccountNumber = substr($accountNumber, 0, 4) . ' **** **** ' . substr($accountNumber, -4);
               ?>
               <p class="card-number"><?= $formattedAccountNumber ?></p>
               <img src="../assets/img/bank-logo.svg" alt="bank-logo" class="bank-logo">
          </div>
     </div>
</section>

<div class="line"></div>

<section class="recent-transactions">
  <div class="card-container">
    <h2 class="title">Recent Transactions</h2>
    <div class="card">
      <ul class="transaction-list">
        <?php
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM `statement` WHERE email='$email'";
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

            // Determine transaction type and color
            $transactionType = $credit > 0 ? 'credit' : 'debit';
            $amount = $credit > 0 ? $credit : $debit;
            $amountColor = $credit > 0 ? 'green' : 'red';
            $iconBgColor = $credit > 0 ? '#D4EFDF' : '#FFE5B4'; // Colors for credit/debit
        ?>
        <li class="transaction-item">
          <div class="transaction-content">
            <div class="details">
              <p class="transaction-title"><?= htmlspecialchars($narration); ?></p>
              <p class="transaction-date"><?= htmlspecialchars($date); ?></p>
            </div>
            <p class="transaction-amount" style="color: <?= $amountColor; ?>;">
              <?= $transactionType === 'credit' ? '+' : '-'; ?> $<?= number_format($amount, 2); ?>
            </p>
          </div>
        </li>
        <?php
          }
        } else {
          echo "<li>No recent transactions found.</li>";
        }
        ?>
      </ul>
    </div>
  </div>
</section>

<div class="line"></div>


<div class="card-container">
    <h2 class="title">Quick Transfer</h2>

    <!-- Carousel -->
    <div class="carousel-buttons">
      <button class="button" id="prevButton">◀</button>
      <button class="button" id="nextButton">▶</button>
    </div>
    <div class="carousel" id="carousel">
      <div class="carousel-item">
        <img src="assets/profile/image-1.png" alt="Profile Image">
        <p class="name">Livia Bator</p>
        <p class="designation">CEO</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-2.png" alt="Profile Image">
        <p class="name">Randy Press</p>
        <p class="designation">Director</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-3.png" alt="Profile Image">
        <p class="name">Workman</p>
        <p class="designation">Designer</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-4.png" alt="Profile Image">
        <p class="name">Kevin Reed</p>
        <p class="designation">UX</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-5.png" alt="Profile Image">
        <p class="name">Sofia Gill</p>
        <p class="designation">Director</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-6.png" alt="Profile Image">
        <p class="name">Jo Barnes</p>
        <p class="designation">Analyst</p>
      </div>
      <div class="carousel-item">
        <img src="assets/profile/image-7.png" alt="Profile Image">
        <p class="name">Felix Vidal</p>
        <p class="designation">CTO</p>
      </div>
    </div>

    <!-- Send Amount Input -->
    <div class="send-amount-container">
      <label for="amountInput">Your Balance</label>
      <input type="number" placeholder=<?= number_format($_SESSION['balance']) ?> oninput="this.className = ''" value=<?= number_format($_SESSION['balance']) ?> disabled>
      <button class="send-button" data-toggle="modal" data-target="#exampleModal">Send</button>
    </div>
</div>






<!-- <div class="line"></div>

<div class="card">
     <ul class="list-group list-group-flush">
          <li class="list-group-item">
               <div class="d-flex justify-content-around">
                    <div class="text-center">
                         <a href="transfer.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-exchange-alt"></i>
                              </button> <br>
                              Wire <br> Transfer
                         </a>
                    </div>
                    <div class="text-center">
                         <button type="button" class="btn btn-primary ms-1">
                              <i class="fas fa-share-alt"></i>
                         </button> <br>
                         <a href="transfer.php">Local<br> Transfer</a>
                    </div>
                    <div class="text-center">
                         <a href="user-manual.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-credit-card"></i>
                              </button> <br>
                              Check <br>Deposit
                         </a>
                    </div>
               </div>
          </li>
          <li class=" list-group-item">
               <div class="d-flex justify-content-around">
                    <div class="text-center">
                         <a href="statement.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-street-view"></i>
                              </button> <br>
                              View <br> Statement
                         </a>
                    </div>
                    <div class="text-center">
                         <a href="statement.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-check-square"></i>
                              </button> <br>
                              Checking<br> Statement
                         </a>
                    </div>
                    <div class="text-center">
                         <a href="user-manual.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-vr-cardboard"></i>
                              </button> <br>
                              Credit <br>Card
                         </a>
                    </div>
               </div>
          </li>
          <li class="list-group-item">
               <div class="d-flex justify-content-around">
                    <div class="text-center">
                         <a href="user-manual.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-money-bill-alt"></i>
                              </button> <br>
                              Invest
                         </a>
                    </div>
                    <div class="text-center">
                         <a href="user-manual.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-box"></i>
                              </button> <br>
                              Logistics
                         </a>
                    </div>
                    <div class="text-center">
                         <a href="user-manual.php">
                              <button type="button" class="btn btn-primary ms-1">
                                   <i class="fas fa-lightbulb"></i>
                              </button> <br>
                              Get<br>Help
                         </a>
                    </div>
               </div>
          </li>
     </ul>
</div> -->


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
                         <form id="regForm" action="send.inc.php" method="POST" autocomplete="off" novalidate>
                              <p id="alert_form_error" class="alert text-center alert-danger p-3 w-100 m-0 mb-3" style="display:none">Form validation error</p>
                              <h5>Enter Transfer Details</h5>

                              <!-- One "tab" for each step in the form: -->
                              <div class="tab mt-5">To bank
                                   <p><input placeholder=<?= number_format($_SESSION['balance']) ?> oninput="this.className = ''" value=<?= number_format($_SESSION['balance']) ?> disabled></p>
                                   <p><input placeholder="Account Number..." oninput="this.className = ''" type="number" name="accountNumber" octavalidate="R,DIGITS" minlength="3" ov-minlength:msg="" id="accountNumber"></p>
                                   <p><input placeholder="Account Name..." oninput="this.className = ''" name="accountName" id="accountName" octavalidate="R,ALPHA_SPACES"></p>
                                   <p><input placeholder="Bank Name" oninput="this.className = ''" name="bankName" id="bankName" octavalidate="R,TEXT"></p>
                                   <p><input placeholder="Bank Address" oninput="this.className = ''" name="bankAddress" id="bankAddress" octavalidate="R,TEXT"></p>
                                   <p><input placeholder="Amount..." oninput="this.className = ''" name="amount" id="amount" type="number" octavalidate="R,DIGITS" minlength="3" ov-minlength:msg="The amount to send must be a minimum of 3 digits"></p>
                              </div>

                              <div class="tab mt-5">Other details:
                                   <p><input placeholder="Swift Code (BIC Code)" oninput="this.className = ''" name="swiftCode" id="swiftCode" octavalidate="R,SWIFT"></p>
                                   <p><input placeholder="Narration" oninput="this.className = ''" name="narration" id="narration" octavalidate="R,TEXT"></p>
                              </div>

                              <div class="tab mt-5">Confirm Details:
                                   <p style="font-size: 14px;">To Name: <span id="showAccountName"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">To Account Number: <span id="showAccountNumber"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">Amount: <span id="showAmount"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">Narration: <span id="showNarration"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">BIC Code (Swift): <span id="showBIC"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">Bank Name: <span id="showBankName"></span></p>
                                   <hr>
                                   <p style="font-size: 14px;">Bank Address: <span id="showBankAddress"></span></p>
                              </div>

                              <div class="tab mt-5">
                                   <h6>Note this transfer will take one to Five working days </h6>
                                   <hr>
                                   <p style="font-size: 12px;">
                                        Generally speaking international bank transfer will arrive within one to five working days <br>
                                        lets explore what this look like
                                   </p>
                                   <hr>
                                   <!-- validate pin -->
                                   <p><input placeholder="Enter Pin" type="number" name="pin" id="pin" octavalidate="R,DIGITS" minlength="5" equalto="confirmPin" ov-equalto:msg="Incorrect Pin" ov-required:msg="Please provide a pin" ov-minlength:msg="Your password must be at least 5 characters long"></p>
                                   <p><input type="number" placeholder="<?= $_SESSION['pin'] ?>" value="<?= $_SESSION['pin'] ?>" name="pin" id="confirmPin" class="d-none"></p>
                              </div>

                              <div style="overflow:auto;">
                                   <div style="float:right;">
                                        <button type="submit" name="send" class="btn btn-outline-info btn-md" id="doneBtn" style="display:none">Done</button>
                                        <button type="button" class="btn btn-outline-info btn-md" id="nextBtn">Next</button>
                                   </div>
                                   <div style="float:left;">
                                        <button type="button" id="prevBtn" class="btn btn-outline-info btn-md">Previous</button>
                                   </div>
                              </div>

                              <!-- Circles which indicates the steps of the form: -->
                              <div style="text-align:center;margin-top:40px;">
                                   <span class="step"></span>
                                   <span class="step"></span>
                                   <span class="step"></span>
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

<?php require_once("dashboard-footer.php") ?>