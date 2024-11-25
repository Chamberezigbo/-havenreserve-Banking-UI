<?php require_once("dashbord-header.php") ?>

<style>
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

      /* Media Queries for Responsiveness */
     @media (max-width: 768px) {
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


<div class="container">
     <h6>
          Account Statement
     </h6>
     <hr>

     <div class="table-responsive">
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

     </div>
</div>


<?php require_once("dashboard-footer.php") ?>