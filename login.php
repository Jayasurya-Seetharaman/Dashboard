<?php
ob_start();
ob_clean();
session_start();
include 'cnt/db.php';
extract($_REQUEST);

if(isset($_POST['login'])) {
  $user_name = $_POST['name'];
  $password = $_POST['pswd'];
  $res = mysql_query("select * from user where user = '$user_name' and password = '$password'");
  if(mysql_num_rows($res)>0)
	{
    $rows_SelUser = mysql_fetch_object($res);
		$_SESSION['USER_ID'] = $rows_SelUser->id;
    header('Location:home.php');
  }else {
    echo "<script>alert('Wrong username or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrapV4.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>

  <style>
    .btn-login {
      color: #fff;
      background-color: #5c5f63;
      border-color: #5c5f63;
    }
    .btn-login:hover {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-lg-4 offset-lg-4">
      <div class="card" style="margin-top:10rem;background-color: #1d97b3 !important;color: #FFF !important;">
        <div class="card-body">
          <h4 class="card-title" style="text-align: center;">Login</h4>
          <form action="" method="post">
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" class="form-control" placeholder="Enter name" name="name" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" placeholder="Enter password" name="pswd" required>
            </div>
            <div align="center">
              <button type="submit" name="login" class="btn btn-login">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
