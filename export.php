<?php
  include 'cnt/db.php';
if(isset( $_POST['export'] )) {
  // echo "string";
$Date=date('Y-m-d h:i:s',time());
// echo $Date;
  $file='Dashboard-Report-Till-Date-'.date('d-m-Y', strtotime($Date)).".xls";
	$title='Dashboard-Report-Till-Date-'.date('d-m-Y', strtotime($Date));
  $date_type='Till Date : '.date('d-m-Y', strtotime($Date));
  // echo $title;
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment;filename=".$file );
  header('Pragma: no-cache');
  header('Expires: 0');
  $sql = "SELECT * FROM data ORDER BY id DESC ";
  $result = mysql_query($sql);
} elseif(isset( $_POST['export_closed'] )) {
  // echo "string";
$Date=date('Y-m-d h:i:s',time());
// echo $Date;
  $file='Closed-Report-Till-Date-'.date('d-m-Y', strtotime($Date)).".xls";
	$title='Closed-Report-Till-Date-'.date('d-m-Y', strtotime($Date));
  $date_type='Till Date : '.date('d-m-Y', strtotime($Date));
  // echo $title;
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment;filename=".$file );
  header('Pragma: no-cache');
  header('Expires: 0');
  $sql = "SELECT * FROM data WHERE type = 'closed' ORDER BY id DESC ";
  $result = mysql_query($sql);
} elseif(isset( $_POST['export_open'] )) {
  // echo "string";
$Date=date('Y-m-d h:i:s',time());
// echo $Date;
  $file='Open-Report-Till-Date-'.date('d-m-Y', strtotime($Date)).".xls";
	$title='Open-Report-Till-Date-'.date('d-m-Y', strtotime($Date));
  $date_type='Till Date : '.date('d-m-Y', strtotime($Date));
  // echo $title;
  header("Content-Type: application/vnd.ms-excel");
  header("Content-Disposition: attachment;filename=".$file );
  header('Pragma: no-cache');
  header('Expires: 0');
  $sql = "SELECT * FROM data WHERE type != 'closed' ORDER BY id DESC ";
  $result = mysql_query($sql);
}

 ?>
 <table width="100%" align="center" cellpadding="0" cellspacing="0">
   <tr>
       <td height="30" valign="top">
         <table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #5053d3; border-top:none;">
           <tr style=" color:#3337c8; font-weight:bold;">

             <td width="200" colspan="10" height="30" align="center" style="border-right:1px solid #5053d3; vertical-align:middle !important"><strong><?php if($_POST['export_open']) { ?>
               Dashboard - Open - Report
             <?php } elseif ($_POST['export_closed']) { ?>
               Dashboard - Closed - Report
             <?php } else {?>Dashboard - Report
             <?php } ?>
               </strong></td>
             <td width="300" colspan="2" align="center" style="border-right:1px solid #5053d3; vertical-align:middle !important"><strong>
               <?php echo $date_type; ?>
               </strong></td>
           </tr>
         </table>
       </td>
     </tr>

     <tr>
       <td><?php
      	if(mysql_num_rows($result) > 0)
        {
  ?>
        <table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #5053d3; border-top:none;">
         <tr style="background:#5053d3; color:#fff; font-weight:bold;">
           <td width="50" height="30" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>S.No</strong></td>
           <td width="100" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Bank Name</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>FDR Number</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Amount</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Date From</strong></td>
           <td width="100" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Date To</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Rate of Interest</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Name</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Maturity</strong></td>
           <td width="100" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Interest Frequent</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Amt of Interest</strong></td>
           <td width="50" align="center" style="border-right:1px solid #3337c8; vertical-align:middle !important"><strong>Status</strong></td>
         </tr>
         <?php
         $sno=0;
         $tot_amt = 0;
         $tot_roi = 0;
         $tot_maturity = 0;
         $tot_int_frequent = 0;
         while($sel_det = mysql_fetch_array($result)) {
           $sno=$sno+1;
         ?>
         <tr>
           <td height="30" align="center" style="border-left:1px solid #5053d3; border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important"><?php echo $sno;?></td>
           <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
             <?php echo $sel_det['bank']; ?></td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['fdr']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['amt']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['frm']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['tod']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['roi']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['name']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['maturity']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['int_frequent']; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
               <?php echo $sel_det['amt_of_interest']."%"; ?>
             </td>
             <td align="center" style="border-right:1px solid #5053d3; <?php if($sno !=1) { ?>border-top:1px solid #5053d3;<? } ?> vertical-align:middle !important">
              <?php echo $sel_det['status']; ?>
             </td>

         </tr>
       <?php
       $tot_amt += $sel_det['amt'];
        $tot_roi += $sel_det['roi'];
       $tot_maturity += $sel_det['maturity'];
       $tot_int_frequent += $sel_det['int_frequent'];
     } ?>
       <tr style="border-right: 1px solid #5053d3;border-bottom: 1px solid #5053d3;border-top:1px solid #5053d3;">
         <td colspan="3" align="center">Total</td>
         <td align="center"><?php echo $tot_amt; ?></td>
         <td colspan="2"></td>
         <td align="center"><?php echo $tot_roi; ?></td>
         <td></td>
         <td align="center"><?php echo $tot_maturity; ?></td>
         <td align="center"><?php echo $tot_int_frequent; ?></td>
         <td colspan="2"></td>
       </tr>
       </table></td>
  </tr>
<?  } else { ?>
<tr>
  <td colspan="10">No Data Found!!!</td>
</tr>
<? } ?>

 </table>
