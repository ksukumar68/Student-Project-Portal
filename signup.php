<?php include 'nav.php';?>


<?php
include 'server.php';
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
  //include 'headers.php';
  ?>
<div class="container" >
  <div class="row">

    <div class="col-sm-12 main" style="padding-left: 25%;padding-right: 25%;">
      <h3>Registration</h3>
      <form class="form-horizontal" role="form" action="signup.php" method="post">
                <div class="form-group">
                    <label for="firstName" class="control-label">Full Name</label>
                        <input type="text"  placeholder="Full Name" class="form-control"   name="name" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <label for="email" class=" control-label">Email</label>

                        <input type="email"  placeholder="Email" class="form-control" name="email" value="<?php echo $email; ?>">

                </div>
                <div class="form-group">
                    <label for="branch" class=" control-label">Branch</label>

                        <input type="text"  placeholder="Branch" class="form-control"  name="branch" value="<?php echo $branch; ?>">

                </div>
                <div class="form-group">
                    <label for="your" class=" control-label">You are a</label>

                        <input type="text"  placeholder="Student or Teacher" class="form-control"  name="your" value="<?php echo $your; ?>">

                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Password</label>

                        <input type="password"  placeholder="Password" class="form-control" name="password">

                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Repeat Password</label>

                        <input type="password"  placeholder="Password" class="form-control" name="password2">

                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Sign Up</button>
                </div>
                <p>
                  Already a member ??? <a href="signin.php">Log in</a>
                </p>
            </form>
    </div>
    <div class="col-sm-12 main" style="padding-left: 25%;padding-right: 25%;">

      <?php  // include('errors.php'); ?>
      <div class="panel panel-default">
    <div class="panel-body"><?php   include('errors.php'); ?></div>
  </div>
    </div>
  </div>
</div>
</body>
</html>
<?php  include('footer.php'); ?>