<?php

ob_start();
ob_clean();
session_start();
include 'cnt/db.php';

if($_SESSION['USER_ID']=='') header('Location:login.php');

if(isset($_POST['logout'])) {
  session_start();
  unset($_SESSION['USER_ID']);
  header('Location:index.php');
}


  $ID = $_GET['id'];

  $FILTER_FLAG = "0";
  $OPEN_FLAG = "0";
  $CLOSED_FLAG = "0";

  if($ID != '') {

    // echo "Test";
  }


//Filter
if(isset($_POST['filter'])) {
  $bank = $_POST['bank_sel_name'];
  $name = $_POST['client_sel_name'];
  $to = $_POST['date_sel'];
  // echo $bank."<br>".$name."<br>".$to;
  // echo $bank;
  if($bank !="Bank Name") {
    $sql = "SELECT * FROM data WHERE bank = '$bank' AND name = '$name' AND tod = '$to' ORDER BY id DESC ";
    $FILTER_FLAG = "1";
  }else {
    // echo "Test";
    // echo '<script>disp(); </script>';
    $sql = "SELECT * FROM data ORDER BY id DESC ";
  }
}elseif (isset($_POST['closed'])) {
  $CLOSED_FLAG = 1;
  $sql = "SELECT * FROM data WHERE type = 'closed' ORDER BY id DESC ";
} else {
  $OPEN_FLAG = 1;
  $sql = "SELECT * FROM data WHERE type != 'closed' ORDER BY id DESC ";
}

  //To Update
if (isset( $_POST['edit'] )) {
  // echo $bank;
  $id = $_POST['id'];
  $bank =$_POST['bank'];
  $amt = $_POST['amt'];
  $from = $_POST['from'];
  $roi = $_POST['roi'];
  $maturity = $_POST['maturity'];
  $fdr = $_POST['fdr'];
  $to = $_POST['to'];
  $name = $_POST['name'];
  $int_frequent = $_POST['int_frequent'];
  $amt_of_interest = $_POST['amt_of_interest'];
  // echo $name;

  $status;
  if($amt < $maturity) {
    $status = "C";
  } else {
    $status = (($amt * $roi)/12) * 3;
  }

  $da1=date_create(date("Y-m-d"));
  $da2=date_create($to);
  $dif2=date_diff($da1,$da2);
  $ans2 = $dif2->format("%R%a");
  if($ans2 <= 0) {
     $type = "closed";
  }else {
    $type = "open";
  }

  $update = mysql_query("UPDATE data SET bank = '$bank', fdr = '$fdr', amt = '$amt', frm = '$from', tod = '$to', roi = '$roi', name = '$name', maturity = '$maturity', int_frequent ='$int_frequent', amt_of_interest = '$amt_of_interest', status = '$status', type = '$type'
     WHERE id = '$id' ")
  or die(mysql_error());
  // echo $status;
}

//To copy
if (isset( $_POST['copy'] )) {
  // echo $bank;
  $id = $_POST['id'];
  $bank =$_POST['bank'];
  $amt = $_POST['amt'];
  $from = $_POST['from'];
  $roi = $_POST['roi'];
  $maturity = $_POST['maturity'];
  $fdr = $_POST['fdr'];
  $to = $_POST['to'];
  $name = $_POST['name'];
  $int_frequent = $_POST['int_frequent'];
  $amt_of_interest = $_POST['amt_of_interest'];
  // echo $name;
  $status;
  if($amt < $maturity) {
    $status = "C";
  } else {
    $status = (($amt * $roi)/12) * 3;
  }

  $d1=date_create(date("Y-m-d"));
  $d2=date_create($to);
  $dif3=date_diff($d1,$d2);
  $ans3 = $dif3->format("%R%a");
  if($ans3 <= 0) {
     $type = "closed";
  }else {
    $type = "open";
  }
  // echo $status;

  $copy = mysql_query("INSERT INTO data values ( '', '$bank', '$fdr', '$amt', '$from', '$to', '$roi', '$name', '$maturity', '$int_frequent', '$amt_of_interest', '$status', '$type' )")
  or die(mysql_error());

}

//To delete
if (isset( $_POST['delete'] )) {
  $ID = $_POST['id'];
  // echo $ID;

  $delete = mysql_query("delete from data where id='$ID'");

}



//To insert/Add
  if (isset( $_POST['submit'] )) {

   $bank =$_POST['bank'];
   $amt = $_POST['amt'];
   $from = $_POST['from'];
   $roi = $_POST['roi'];
   $maturity = $_POST['maturity'];
   $fdr = $_POST['fdr'];
   $to = $_POST['to'];
   $name = $_POST['name'];
   $int_frequent = $_POST['int_frequent'];
   $amt_of_interest = $_POST['amt_of_interest'];
   $status;
   if($amt < $maturity) {
     $status = "C";
   } else {
     $status = (($amt * $roi)/12) * 3;
   }

   $dat1=date_create(date("Y-m-d"));
   $dat2=date_create($to);
   $dif=date_diff($dat1,$dat2);
   $ans1 = $dif->format("%R%a");
   if($ans < 0) {
      $type = "closed";
   }else {
     $type = "open";
   }

   // echo "Name:".$name;
   $ins = mysql_query("INSERT INTO data values ( '', '$bank', '$fdr', '$amt', '$from', '$to', '$roi', '$name', '$maturity', '$int_frequent', '$amt_of_interest', '$status', '$type' )");
   // echo $status;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard | Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/modal.css">

  <!--Font awesome-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.css" type="text/css" media="all" />
  <link rel="stylesheet" href="font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css" type="text/css" media="all" />

  <!--Font-->
  <!-- <link href="css?family=Roboto" rel="stylesheet"> -->
  <link href="css/roboto.css" rel="stylesheet">
  <!-- <script src="js/jquery.min.js"></script> -->

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->


  <!-- <script src="js/popper.min.js"></script> -->

  <!-- <script src="js/bootstrap.min.js"></script>  -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

 <!-- Sweetalert -->
 <link rel="stylesheet" href="css/sweetalert2.min.css"/>
 <script src="js/sweetalert2.min.js"></script>
<!-- W3.js -->
<script src="js/w3.js"></script>

  <script>
      $(document).ready(function(){
          // $("#filter").mouseenter(function(){
          //     $('.filter-grid').css('display','inline-block');
          // });
          // $(".filter-grid").mouseleave(function(){
          //     $('.filter-grid').css('display','none');
          // });
          $("#search").click(function(){
            $('.filter-grid').css('display','none');
          });
          $("#filter").click(function(){
            $('.filter-grid').fadeToggle("slow");
          });


      });
  </script>
</head>
<body>

<!-- header -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Dashboard</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <!-- <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul> -->
        <ul class="nav navbar-nav navbar-right">
          <form action="export.php" method="post" style="display: inline-block;float: left;">
            <li class="export"><input type="submit" name="export_open" value="Export Open " style="background: inherit;border: none;"></li>
          </form>
          <form action="export.php" method="post" style="display: inline-block;float: left;">
            <li class="export"><input type="submit" name="export_closed" value="Export Closed " style="background: inherit;border: none;"></li>
          </form>
          <form action="export.php" method="post" style="display: inline-block;float: left;">
            <li class="export"><input type="submit" name="export" value="Export All " style="background: inherit;border: none;"></li>
          </form>
        <form action="" method="post" style="display: inline-block;float: left;">
        <li class="export <?php if($CLOSED_FLAG) {?>exp-atcive<?php } ?>"><input type="submit" name="closed" value="Closed" style="background: inherit;border: none;"></li>
      </form>
      <form action="" method="post" style="display: inline-block;float: left;">
      <li class="export <?php if($OPEN_FLAG) {?>exp-atcive<?php } ?>"><input type="submit" name="open" value="Open" style="background: inherit;border: none;"></li>
    </form>
          <?php if($FILTER_FLAG != "0") { ?>
            <li id="filter-cancel"><a href="">Cancel</a></li>
          <?php } ?>
          <li id="filter"><a href="javascript:void(0)">
            <span class="fa fa-filter" aria-hidden="true"></span> Filter</a></li>
          <!-- <li><a href="#"><span class="fa fa-sign-out" aria-hidden="true"></span> LogOut</a></li> -->
          <form action="" method="post" style="display: inline-block;float: left;">
            <li class="export"><span class="fa fa-sign-out" aria-hidden="true"></span><input type="submit" name="logout" value="Logout " style="background: inherit;border: none;"></li>
          </form>
        </ul>
      </div>
    </div>
  </nav>
<!-- Header ends-->
<div class="filter-grid" style="
position: absolute;
    margin-right: 4px;
    z-index: 9999;
    top: 48px;
    display: none;
    max-width: 700px;
">
<form action="" method="post">
    <select name="bank_sel_name" id="bank_sel_name" onchange="getClient();">
      <option>Bank Name</option>
      <?php $sel_bank = mysql_query("SELECT DISTINCT  bank FROM data");
      while($sel_bank_det = mysql_fetch_array($sel_bank)) {
       ?>
      <option><?php echo $sel_bank_det['bank']; ?></option>
    <?php } ?>
    </select>

    <select name="client_sel_name" id="client_sel_name" onchange="getDate();">
      <option>Client Name</option>
    </select>

    <select name="date_sel" id="date_sel">
      <option>Exp.Date</option>
    </select>

    <input type="submit" name="filter" id="search" class="btn btn-search" style="margin-right: 10px;">
</form>
</div>

<!--Plus -->
<div class="fixed-plus">
    <a href="javascript:void(0)" id="myBtn" data-toggle="modal" data-target="#myModal" title="Add new datas"><i class="fa fa-plus" aria-hidden="true" style="font-size: 26px;color: #FFF;padding: 10px;"></i></a>
</div>
<?php if($ins) { ?>
<!-- <div class="alert alert-success alert-dismissable fixed-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Data has been Added.
</div> -->
<script>
swal('Data has been Added !')
</script>
<?php } ?>

<?php if($update) { ?>
<!-- <div class="alert alert-success alert-dismissable fixed-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Data has been Updated.
</div> -->
<script>
swal('Data has been Updated !')
</script>
<?php } ?>

<?php if($copy) { ?>
<!-- <div class="alert alert-success alert-dismissable fixed-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Data has been Added.
</div> -->
<script>
swal('Data has been Added !')
</script>
<?php } ?>

<div class="container-fluid own-container">
  <div class="col-lg-2 col-lg-offset-10">
    <!-- <span class="fa fa-search" aria-hidden="true"></span>&nbsp; -->
    <img src="img/search.png">&nbsp;
    <input type="text" class="cust-ip" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search">
  </div>
</div>

<!-- <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</a> -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <form action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 style="line-height: 1.5;">Fill The Detail</h4>
      </div>
      <div class="modal-body">
        <!-- <div class="col-lg-12"><p style="margin-left: -15px;padding: 10px 0px;">Personal Info</p></div> -->
        <div class="row">
          <div class="col-lg-6">
            <p>Bank Name:</p>
            <input type="text" class="form-control" name="bank" required>
            <p>Amount:</p>
            <input type="text" class="form-control" name="amt" required>
            <p>Date (From):</p>
            <input type="date" class="form-control" name="from" required>
            <p>R.O.%:</p>
            <input type="text" class="form-control" name="roi" required>
            <p>Mat.Vlu :</p>
            <input type="text" class="form-control" name="maturity" required>
          </div>
          <div class="col-lg-6">
            <p>FDR Number:</p>
            <input type="text" class="form-control" name="fdr" required>
            <p>Amt of Interest:</p>
            <input type="text" class="form-control" name="amt_of_interest" required>
            <p>Date (To):</p>
            <input type="date" class="form-control" name="to" required>
            <p>Name:</p>
            <input type="text" class="form-control" name="name" required>
            <p>%Frq :</p>
            <input type="text" class="form-control" name="int_frequent" required>
          </div>
      </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-mod float-left" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-mod float-right" name="submit">Add</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal Ends -->
</form>

<div class="container-fluid">
  <div class="row">
    <div class="table-responsive ">
      <table class="table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>S.No</th>
                  <th>Bank Name</th>
                  <th>FDR Number</th>
                  <th>Amount</th>
                  <th>Date From</th>
                  <th>Date To</th>
                  <th>Rate of Interest</th>
                  <th>Name</th>
                  <th>Maturity</th>
                  <th>Interest Frequent</th>
                  <th>Amt of Interest</th>
                  <th>Status</th>
                  <!-- <th><a href="javascript:void(0)" title="Switch to inserting"><i class="fa fa-plus" aria-hidden="true"></i></a></th> -->
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody id="id01">


          <?php

          $result = mysql_query($sql);
          $i = 0;
          $tot_amt = 0;
          $tot_roi = 0;
          $tot_maturity = 0;
          $tot_int_frequent = 0;

          if(mysql_num_rows($result)>0) {

          while($sel_det = mysql_fetch_array($result)) {
            $i += 1;
            // $_SESSION['id'] = $sel_det['id'];
            // echo $_SESSION['id'];
            // $sel_bank = $sel_det['bank'];
            // $sel_fdr = $sel_det['fdr'];
            // $sel_amt = $sel_det['amt'];
            // $sel_frm = $sel_det['frm'];
            // $sel_to = $sel_det['to'];
            // $sel_roi = $sel_det['roi'];
            // $sel_name = $sel_det['name'];
            // $sel_maturity = $sel_det['maturity'];
            // $sel_int_frequent = $sel_det['int_frequent'];
            // $sel_amt_of_interest = $sel_det['amt_of_interest'];



          $date1=date_create(date("Y-m-d"));
          $date2=date_create($sel_det['tod']);
          $diff=date_diff($date1,$date2);
          $ans = $diff->format("%R%a");
          ?>
              <tr class="item" <?php if($ans <= 7 and $ans >= 0) { ?>
                style="background-color:#efb5b5;"
              <?php } ?>
              >
          <?php
          if(!$CLOSED_FLAG and !$FILTER_FLAG) {
            if($ans <=0 ) {
              $Temp_id = $sel_det['id'];
              mysql_query("UPDATE data SET type = 'closed' WHERE id = '$Temp_id' ");
              continue;
            }
            }
           ?>
                <form action="" method="post">
                  <input type="hidden" style="display:none;" name="id" value="<?php echo $sel_det['id']; ?>" />
                  <td><?php echo $i; ?></td>
                  <td><?php echo $sel_det['bank']; ?></td>
                  <td><?php echo $sel_det['fdr']; ?></td>
                  <td><?php echo $sel_det['amt']; ?></td>
                  <td><?php echo $sel_det['frm']; ?></td>
                  <td><?php echo $sel_det['tod']; ?></td>
                  <td><?php echo $sel_det['roi']; ?></td>
                  <td><?php echo $sel_det['name']; ?></td>
                  <td><?php echo $sel_det['maturity']; ?></td>
                  <td><?php echo $sel_det['int_frequent']; ?></td>
                  <td><?php echo $sel_det['amt_of_interest']."%"; ?></td>
                  <td><?php echo $sel_det['status']; ?></td>
                  <td>
                    <!-- <a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a> -->

                    <a href="#editDialog" data-type="edit" data-id="<?php echo $sel_det['id'] ?>" style="color:#8c8c8c !important;" class="open-EditDialog btn icon" data-toggle="modal"><i class="fa fa-pencil cursor" title="Edit"></i></a>&nbsp;
                    <a href="#copyDialog" data-type="copy" data-id="<?php echo $sel_det['id'] ?>" style="color:#8c8c8c !important;" class="open-CopyDialog btn icon" data-toggle="modal"><i class="fa fa-clone cursor" title="Copy" aria-hidden="true"></i></a>&nbsp;
                    <button type="submit" name="delete" class="btn icon" href="javascript:void(0)" style="color:#8c8c8c !important;"><i class="fa fa-trash cursor" title="Delete" aria-hidden="true"></i></button></td>
                  </form>
              </tr>
              <!--Total-->
                <?php $tot_amt += $sel_det['amt'];
                 $tot_roi += $sel_det['roi'];
                $tot_maturity += $sel_det['maturity'];
                $tot_int_frequent += $sel_det['int_frequent'];
             } ?>

             <tr style="border-top: 1px solid;border-bottom: 1px solid;">
               <td colspan="3">Total</td>
               <td><?php echo $tot_amt; ?></td>
               <td colspan="2"></td>
               <td><?php echo $tot_roi; ?></td>
               <td></td>
               <td><?php echo $tot_maturity; ?></td>
               <td><?php echo $tot_int_frequent; ?></td>
               <td colspan="3"></td>
             </tr>
           <?php } else { ?>
             <tr><td align="center" colspan="12">No Data Available</td></tr>
           <?php } ?>
            <!-- Copy Modal -->
            <div class="modal fade" id="copyDialog">
              <div class="modal-content">
               <div class="modal-header">
                  <button class="close" data-dismiss="modal">×</button>
                  <h3>Copy The Details</h3>
                </div>
                <div id="copyhint">
                </div>
              </div>
            </div>


            <div class="modal fade" id="editDialog">
              <div class="modal-content">
               <div class="modal-header">
                  <button class="close" data-dismiss="modal">×</button>
                  <h3>Fill The Details</h3>
                </div>
                <!-- <form action="" method="post">
                <div class="modal-body"> -->

                    <!-- <input type="hidden" name="bookId" id="bookId" value=""/>
                    <input type="hidden" name="type" id="type" value=""/> -->
                    <div id="txtHint">
                    </div>
                <!-- </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-mod float-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-mod float-right" name="edit">Save changes</button>
                </div></form> -->
              </div>
            </div>


          </tbody>
      </table>
    </div>
</div>
</div>

<script>
//Get Client name
function getClient() {
  var bank = $("#bank_sel_name").val();
  // alert(bank);
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             document.getElementById("client_sel_name").innerHTML = this.responseText;
             getDate();
         }
     };
     xmlhttp.open("GET", "getclient.php?bank=" + bank, true);
     xmlhttp.send();
}
//Get Date Name
function getDate() {
  var bank = $("#bank_sel_name").val();
  var client = $("#client_sel_name").val();
  // alert(client);
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("date_sel").innerHTML = this.responseText;
         }
     };
     xmlhttp.open("GET", "getdate.php?bank=" + bank+"&client="+client, true);
     xmlhttp.send();
}
</script>

<script>
function test(val) {
  var t = val;
  alert(t);
}
</script>
<script>
$(document).on("click", ".open-EditDialog", function () {
     var id = $(this).data('id');
     var type = $(this).data('type');
     // $(".modal-body #bookId").val( myBookId );
     // $(".modal-body #type").val( type );
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?id=" + id+"type", true);
        xmlhttp.send();
});

//Copy modal
$(document).on("click", ".open-CopyDialog", function () {
     var id = $(this).data('id');
     var type = $(this).data('type');
     // $(".modal-body #bookId").val( myBookId );
     // $(".modal-body #type").val( type );
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("copyhint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "copyhint.php?id=" + id+"type", true);
        xmlhttp.send();
});

</script>

<script>

function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  alert(tr.length);
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0].value;

    alert(td);
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>

</body>
</html>
<?php if($delete) { ?>
  <script>
swal('Data has been deleted !')
  </script>
<?php } ?>
