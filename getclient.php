<?php
include 'cnt/db.php';
$BANK = $_GET['bank'];


$sql = "SELECT name FROM data WHERE bank = '$BANK' ";
$result = mysql_query($sql);

while($sel_det = mysql_fetch_array($result)) {

?>

<option><?php echo $sel_det['name']; ?></option>

  <?php
}
?>
