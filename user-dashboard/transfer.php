<?php require_once("dashbord-header.php"); ?>

<style>
     .card-container {
     background-color: #fff;
     padding: 20px;
     border-radius: 10px;
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
</style>

<div class="container">
     <!-- alert for error -->
     <?php if (isset($_SESSION['error']) &&  $_SESSION['error'] == 1) { ?>
          <div class="alert alert-warning alert-dismissible fade show w-25 ml-auto" role="alert" id="alertActivation">
               <strong id="message">
                    <?php echo $_SESSION['errorMassage']; ?>
                    <?php $_SESSION['error'] = 0   ?>
               </strong>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
               </button>
          </div>

     <?php } ?>

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



<?php require_once('dashboard-footer.php'); ?>