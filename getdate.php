<?php
include 'cnt/db.php';
$BANK = $_GET['bank'];
$CLIENT = $_GET['client'];

$sql = "SELECT tod FROM data WHERE bank = '$BANK' AND name = '$CLIENT' ";
$result = mysql_query($sql);

while($sel_det = mysql_fetch_array($result)) {

?>

<option><?php echo $sel_det['tod']; ?></option>

  <?php
}
?>
