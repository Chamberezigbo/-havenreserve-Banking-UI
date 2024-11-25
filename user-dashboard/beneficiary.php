<?php require_once("dashbord-header.php") ?>
<div class="container">
     <h5>
          Account Requisitions
     </h5>
     <hr>
     <form action="#">
          <div class="form-group">
               <label for="exampleFormControlSelect1">Select Branch</label>
               <select class="form-control" id="exampleFormControlSelect1">
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
          <div class="form-group">
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Account Number">
          </div>
          <div class="d-flex justify-content-center">
               <button disabled="disabled">Submit</button>
          </div>
     </form>
</div>


<?php require_once("dashboard-footer.php") ?>