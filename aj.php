<?
  include 'cnt/db.php';

  session_start();
  $ID = $_GET['id'];
  if($ID != '') {

    // echo "Test";
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
  $update = mysql_query("UPDATE data SET bank = '$bank', fdr = '$fdr', amt = '$amt', frm = '$from', tod = '$to', roi = '$roi', name = '$name', maturity = '$maturity', int_frequent ='$int_frequent', amt_of_interest = '$amt_of_interest'
     WHERE id = '$id' ")
  or die(mysql_error());

}

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
  $copy = mysql_query("INSERT INTO data values ( '', '$bank', '$fdr', '$amt', '$from', '$to', '$roi', '$name', '$maturity', '$int_frequent', '$amt_of_interest' )")
  or die(mysql_error());

}


if (isset( $_POST['delete'] )) {
  $ID = $_POST['id'];
  // echo $ID;

  $delete = mysql_query("delete from data where id='$ID'");

}




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

   // echo "Name:".$name;
   $ins = mysql_query("INSERT INTO data values ( '', '$bank', '$fdr', '$amt', '$from', '$to', '$roi', '$name', '$maturity', '$int_frequent', '$amt_of_interest' )");

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>  -->

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" /> -->

  <!--Font-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <!-- <script src="js/jquery.min.js"></script> -->

  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->


  <!-- <script src="js/popper.min.js"></script> -->

  <!-- <script src="js/bootstrap.min.js"></script>  -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- Sweetalert -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.min.css"/>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.min.js"></script>


  <script>
      $(document).ready(function(){
          $("#filter").mouseenter(function(){
              $('.filter-grid').css('display','inline-block');
          });
          // $(".filter-grid").mouseleave(function(){
          //     $('.filter-grid').css('display','none');
          // });
          $("#search").click(function(){
            $('.filter-grid').css('display','none');
          });
          $("#filter").click(function(){
            $('.filter-grid').css('display','none');
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
        <a class="navbar-brand" href="#">Dashboard</a>
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
          <li class="export"><input type="submit" name="export" value="Export" style="background: inherit;border: none;"></li>
        </form>
          <li id="filter"><a href="javascript:void(0)"><span class="fa fa-filter" aria-hidden="true"></span> Filter</a></li>
          <li><a href="#"><span class="fa fa-sign-out" aria-hidden="true"></span> LogOut</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- Header ends-->
<div class="filter-grid" style="position: absolute;margin-left: 53%;z-index: 9999;top: 48px;">
<form action="" method="post">
    <select>
      <option>Bank Name</option>
      <option>SBI</option>
    </select>

    <select>
      <option>Clinet Name</option>
      <option>Hari</option>
    </select>

    <select>
      <option>Exp.Date</option>
      <option>26-12-17</option>
    </select>

    <input type="submit" id="search" class="btn btn-search" style="margin-right: 10px;">
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
    <input type="text" class="cust-ip" onkeyup="myFunction()" id="myInput" placeholder="Search">
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
            <input type="text" class="form-control" name="bank">
            <p>Amount:</p>
            <input type="text" class="form-control" name="amt">
            <p>Date (From):</p>
            <input type="date" class="form-control" name="from">
            <p>R.O.%:</p>
            <input type="text" class="form-control" name="roi">
            <p>Mat.Vlu :</p>
            <input type="text" class="form-control" name="maturity">
          </div>
          <div class="col-lg-6">
            <p>FDR Number:</p>
            <input type="text" class="form-control" name="fdr">
            <p>Amt of Interest:</p>
            <input type="text" class="form-control" name="amt_of_interest">
            <p>Date (To):</p>
            <input type="date" class="form-control" name="to">
            <p>Name:</p>
            <input type="text" class="form-control" name="name">
            <p>%Frq :</p>
            <input type="text" class="form-control" name="int_frequent">
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
      <table id="myTable" class="table" cellspacing="0" width="100%">
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
          <tbody>


          <?php
          $sql = "SELECT * FROM data ORDER BY id DESC ";
          $result = mysql_query($sql);
          $i = 0;
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

          ?>

              <tr>
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
                  <td><?php echo $sel_det['amt_of_interest']; ?></td>
                  <td>Q</td>
                  <td>
                    <!-- <a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a> -->

                    <a href="#editDialog" data-type="edit" data-id="<?php echo $sel_det['id'] ?>" style="color:#8c8c8c !important;" class="open-EditDialog btn icon" data-toggle="modal"><i class="fa fa-pencil cursor" title="Edit"></i></a>&nbsp;
                    <a href="#copyDialog" data-type="copy" data-id="<?php echo $sel_det['id'] ?>" style="color:#8c8c8c !important;" class="open-CopyDialog btn icon" data-toggle="modal"><i class="fa fa-clone cursor" title="Copy" aria-hidden="true"></i></a>&nbsp;
                    <button type="submit" name="delete" class="btn icon" href="javascript:void(0)" style="color:#8c8c8c !important;"><i class="fa fa-trash cursor" title="Delete" aria-hidden="true"></i></button></td>
                  </form>
              </tr>

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
</body>
</html>
<?php if($delete) { ?>
  <script>
swal('Data has been deleted !')
  </script>
<?php } ?>
