<?php

include 'server.php';

if(isset($_SESSION['email'])){
  $userEmail = $_SESSION['email'];
//  $userLoggedIn = $_SESSION['name'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
  $user = mysqli_fetch_array($user_details_query);
  // $friend = $user['groupLeader'];
  // $user_details_query = mysqli_query($con, "SELECT name FROM users WHERE groupLeader = '$friend'");
  // $us = mysqli_fetch_array($user_details_query);
}
else{
  header("Location: register.php");
}
 // $sql = "SELECT name FROM users";
// $result = mysqli_query($con, $sql);
// $rows = mysqli_fetch_row($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Project Allocation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css" integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style >
    h1{
      color: #0000;
    }
  </style>
</head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container-fluid">

        <div class="navbar-header">

          <a class="navbar-brand" href="#">Project Allocation</a>
        </div>
          
          <ul class="nav navbar-nav navbar-right">
            <li>
              <div class="dropdown">
    <!-- <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profile
    <span class="caret"></span></button> -->
    <!-- <i class="fas fa-user-circle" data-toggle="dropdown" style="color: #fff; font-size: 2.5em;"></i> -->
    <button class="btn btn-primary" type="button" data-toggle="dropdown"><?php echo $user['name']; ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <h5 style="padding-left: 10px;"><?php echo $user['branch']; ?></h5>
      <h5 style="padding-left: 10px;"><?php echo $user['your']; ?></h5>
    </ul>
  </div>

            </li>
            <li><?php
              if(isset($_SESSION["email"])) : ?>
              <a href="logout.php" style="color: red;"><i class="fas fa-sign-out-alt" style="color: #fff; font-size: 2.5em;"></i></a>
              <?php else :
                   header('location: signin.php');
                ?>
            <?php endif ?></li>

            </ul>

            </div>
            </nav>
            <div class="container">
              <div class="row">

