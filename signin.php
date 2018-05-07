<?php
include 'server.php';
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Project Allocation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
//include 'header.php';
?>
<div class="container" style="padding-top: 5%;">
  <div class="row">
    <div class="col-sm-12 main" style="padding-left: 25%;padding-right: 25%;">
      <h3>Login</h3>
      <form class="form-horizontal" role="form" action="signin.php" method="post">
    <div class="form-group">
      <label for="username">Email</label>
      <input type="text"  class="form-control" name="email" placeholder="Email" >
    </div>
    <div class="form-group">
      <h4>U r a</h4>
      <select class="form-control" name="your">
  <option value="student">Student</option>
  <option value="mentor">Mentor</option>
</select>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" placeholder="password" name="password">
    </div>
    <input type="submit" name="login" class="btn btn-success" value="Sign in">
  </form>
  <p>
    Not  a member ??? <a href="signup.php">Signup</a>
  </p>
    </div>
    <div class="panel-body"><?php   include('errors.php'); ?></div>
  </div>
  
</div>
</body>
</html>
<?php  include('footer.php'); ?>

