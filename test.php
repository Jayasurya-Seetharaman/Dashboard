<?
  include 'cnt/db.php';

  session_start();
  $ID = $_GET['id'];
  if($ID != '') {

    // echo "Test";
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
  $sql = "SELECT * FROM data ORDER BY id DESC ";
  $result = mysql_query($sql);
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
  <script>
      $(document).ready(function(){
          $("#filter").mouseenter(function(){
              $('.filter-grid').css('display','inline-block');
          });
          $(".filter-grid").mouseleave(function(){
              $('.filter-grid').css('display','none');
          })
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
          <li class="export">Export</li>
          <li id="filter"><a href="javascript:void(0)"><span class="fa fa-filter" aria-hidden="true"></span> Filter</a></li>
          <li><a href="#"><span class="fa fa-sign-out" aria-hidden="true"></span> LogOut</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- Header ends-->
<div class="filter-grid" style="position: absolute;margin-left: 53%;z-index: 9999;top: 48px;">

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

    <input type="submit" class="btn btn-search" style="margin-right: 10px;">

</div>

<!--Plus -->
<div class="fixed-plus">
    <a href="javascript:void(0)" id="myBtn" data-toggle="modal" data-target="#myModal" title="Add new datas"><i class="fa fa-plus" aria-hidden="true" style="font-size: 26px;color: #FFF;padding: 10px;"></i></a>
</div>
<?php if($ins) { ?>
<div class="alert alert-success alert-dismissable fixed-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Data has been Added.
</div>
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
        <div class="col-lg-12"><p style="margin-left: -15px;padding: 10px 0px;">Personal Info</p></div>

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
        <button type="button" class="btn btn-mod float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-mod float-right" name="submit">Save changes</button>
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
          $i = 0;
          while($sel_det = mysql_fetch_array($result)) {
            $i += 1;
            
          ?>

              <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $sel_det['bank']; ?></td>
                  <td><?php echo $sel_det['fdr']; ?></td>
                  <td><?php echo $sel_det['amt']; ?></td>
                  <td><?php echo $sel_det['frm']; ?></td>
                  <td><?php echo $sel_det['to']; ?></td>
                  <td><?php echo $sel_det['roi']; ?></td>
                  <td><?php echo $sel_det['name']; ?></td>
                  <td><?php echo $sel_det['maturity']; ?></td>
                  <td><?php echo $sel_det['int_frequent']; ?></td>
                  <td><?php echo $sel_det['amt_of_interest']; ?></td>
                  <td>Q</td>
                  <td>
                    <!-- <a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a> -->

                    <a href="#addBookDialog" data-type="edit" data-id="<?php echo $sel_det['id'] ?>" class="open-AddBookDialog btn icon" data-toggle="modal"><i class="fa fa-pencil cursor" title="Edit"></i></a>&nbsp;
                    <button type="submit" class="btn icon" href="javascript:void(0)" data-toggle="modal" data-target="#myModal"><i class="fa fa-clone cursor" title="Copy" aria-hidden="true"></button></i>&nbsp;
                    <a href="index.php?id=<?=$sel_det['id']?>" style="color:#8c8c8c !important;"><i class="fa fa-trash cursor" title="Delete" aria-hidden="true"></i></a></td>
              </tr>

            <?php } ?>

            <div class="modal" id="addBookDialog">
             <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>Modal header</h3>
              </div>
                <div class="modal-body">
                    <p>some content</p>
                    <input type="hidden" name="bookId" id="bookId" value=""/>
                    <input type="hidden" name="type" id="type" value=""/>

                </div>
            </div>


          </tbody>
      </table>
    </div>
</div>
</div>


<script>

// Get the modal
// var modal = document.getElementById('myModal');

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }
</script>

</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
<!-- <script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
</script> -->
<script>
function test(val) {
  var t = val;
  alert(t);
}
</script>
<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     var type = $(this).data('type');
     $(".modal-body #bookId").val( myBookId );
     $(".modal-body #type").val( type );
});

</script>
</body>
</html>
