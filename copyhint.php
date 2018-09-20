<?php
include 'cnt/db.php';
$ID = $_GET['id'];


$sql = "SELECT * FROM data WHERE id = '$ID' ";
$result = mysql_query($sql);

while($sel_det = mysql_fetch_array($result)) {

?>
<form action="" method="post">
<div class="modal-body">
 <div class="row">
   <div class="col-lg-6">
     <!--  -->
     <p style="display:none"><input type="hidden" name="id" value="<?php echo $sel_det['id']; ?>" required></p>
    <p>Bank Name:</p>
    <input type="text" class="form-control" name="bank" value="<?php echo $sel_det['bank']; ?>" required>
    <p>Amount:</p>
    <input type="text" class="form-control" name="amt" value="<?php echo $sel_det['amt']; ?>" required>
    <p>Date (From):</p>
    <input type="date" class="form-control" name="from" value="<?php echo $sel_det['frm']; ?>" required>
    <p>R.O.%:</p>
    <input type="text" class="form-control" name="roi" value="<?php echo $sel_det['roi']; ?>" required>
    <p>Mat.Vlu :</p>
    <input type="text" class="form-control" name="maturity" value="<?php echo $sel_det['maturity']; ?>" required>
  </div>
  <div class="col-lg-6">
    <p>FDR Number:</p>
    <input type="text" class="form-control" name="fdr" value="<?php echo $sel_det['fdr']; ?>" required>
    <p>Amt of Interest:</p>
    <input type="text" class="form-control" name="amt_of_interest" value="<?php echo $sel_det['amt_of_interest']; ?>" required>
    <p>Date (To):</p>
    <input type="date" class="form-control" name="to" value="<?php echo $sel_det['tod']; ?>" required>
    <p>Name:</p>
    <input type="text" class="form-control" name="name" value="<?php echo $sel_det['name']; ?>" required>
    <p>%Frq :</p>
    <input type="text" class="form-control" name="int_frequent" value="<?php echo $sel_det['int_frequent']; ?>" required>
  </div>
 </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-mod float-left" data-dismiss="modal">Cancel</button>
  <button type="submit" class="btn btn-mod float-right" name="copy">Add</button>
</div>
</form>

  <?php
}
?>
