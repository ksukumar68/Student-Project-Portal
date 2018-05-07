<?php
ob_start();
  session_start();
  $name = "";
  $email = "";
  $branch = "";
  $your = "";
  $errors = array();
  $totalUsers = array();
  $urTeam = array();

  // error_reporting(0);
  // ini_set('display_errors', 0);

  $con = mysqli_connect("localhost", "root", "", "college");

  if(mysqli_connect_errno()){
  echo "Fail to connect".mysqli_connect_errno();
  }

  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $branch= mysqli_real_escape_string($con,$_POST['branch']);
    $your= mysqli_real_escape_string($con,$_POST['your']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $password2 = mysqli_real_escape_string($con,$_POST['password2']);

    if(empty($name)){
      array_push($errors, "* Full name is required");
    }
    if(empty($email)){
      array_push($errors, "* Email is required");
    }
    if(empty($branch)){
      array_push($errors, "* Branch is required");
    }
    if(empty($your)){
      array_push($errors, "* Enter whether u r a student or a teacher");
    }
    if($password != $password2){
      array_push($errors, "* Password don't match");
    }
    if(count($errors) == 0){
      $password = md5($password);
      $sql = "INSERT INTO users(name, email, branch, your, password, groupLeader) VALUES('$name', '$email', '$branch', '$your', '$password', '$email')";
      mysqli_query($con,  $sql);
//      if(mysqli_query($con,  $sql)){
//    echo "Records inserted successfully.";
//    } else{
//    echo "ERROR: Could not able to execute";
//    }
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "You r now logged in";
//    header('location: signin.php');
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal("Thank You!","You have successfully registered Now u can login!","success");';
echo '}, 1000);</script>';
  //  swal("Good job!", "You clicked the button!", "success");
    }
  }

  if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $your = mysqli_real_escape_string($con,$_POST['your']);

    if(empty($email)){
      array_push($errors, "Email is required");
    }
    if(empty($password)){
      array_push($errors, "Password is required");
    }

    // if(count($errors) == 0){
    //   $password = md5($password);
    //   $query = "SELECT * FROM mentor WHERE email = '$email' AND password = '$password'";
    //   $result = mysqli_query($con, $query);
    //   if(mysqli_num_rows($result) == 1){
    //     $_SESSION['email'] = $email;
    //     $_SESSION['success'] = "You r now logged in";
    //     if($your == 'student'){
    //       header('location: profile.php');
    //     }
    //     else{
    //       header('location: mentor.php');
    //     }
    //   }
    // }
      if($your == 'student'){
        if(count($errors) == 0){
      $password = md5($password);
      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) == 1){
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You r now logged in";
          header('location: profile.php');
        }
        }
      }
      elseif($your == 'mentor') {
        if(count($errors) == 0){
      $password = md5($password);
      $query = "SELECT * FROM mentor WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) == 1){
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You r now logged in";
          header('location: mentor.php');
        }
        }
      }
    else{
      array_push($errors, "The usernamee or password is invalid");
    }
  }

  if(isset($_POST['add'])){
    $userEmail = $_SESSION['email'];
    $user_details_query70 = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
  $user23 = mysqli_fetch_array($user_details_query70);
    $removeUser = $_POST['data'];

      if($removeUser != NULL){
        if($removeUser == $user23['name']){
        echo '<script language="javascript">';
        echo 'alert("You r already in the group ")';
        echo '</script>';
      }
      else{
         $userEmail = $_SESSION['email'];
         $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
         $user = mysqli_fetch_array($user_details_query);
         $inc = $user['teamList'] + 1;
         //   echo $inc;
         //    array_push($urTeam, $removeUser);
         //    $conv = $user['team'];
         //    $conv .= implode(';', $urTeam).',';
        //  $qu = "INSERT INTO users (team) VALUES ('$conv')";
        
         $qu = "UPDATE users SET groupLeader = '$userEmail' WHERE name = '$removeUser'";
         $result1 = mysqli_query($con, $qu);
         $qu1 = "UPDATE users SET commit = 2 WHERE name = '$removeUser'";
         $result2 = mysqli_query($con, $qu1);
         $qu2 = "UPDATE users SET teamList = $inc WHERE email = '$userEmail'";
         $result3 = mysqli_query($con, $qu2);
        //  $arr = explode(' ', $user['team']);
        // $_SESSION['art'] = $arr;
      }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Please select any student ")';
      echo '</script>';
    }
  }

  if(isset($_POST['remove'])){
    $userEmail = $_SESSION['email'];
    $user_details_query70 = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
  $user23 = mysqli_fetch_array($user_details_query70);
    $removeUser = $_POST['datar'];
 //   array_pop($urTeam);
 //   $rUser = count($removeUser);
    if($removeUser != NULL){
      if($removeUser == $user23['name']){
        echo '<script language="javascript">';
        echo 'alert("You cannot remove urself ")';
        echo '</script>';
      }
      else{
      $userEmail = $_SESSION['email'];
      $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
      $user = mysqli_fetch_array($user_details_query);

      $inc = $user['teamList'] - 1;
      $grpL="SELECT * FROM users WHERE commit =2  ";
      $gL=mysqli_query($con,$grpL);
      $grp=mysqli_fetch_array($gL);
      $oGL=$grp['email'];

      $qu = "UPDATE users SET groupLeader = '$oGL' WHERE name = '$removeUser'";
      $result1 = mysqli_query($con, $qu);
      $qu1 = "UPDATE users SET commit = 0 WHERE name = '$removeUser'";
      $result2 = mysqli_query($con, $qu1);
      $qu2 = "UPDATE users SET teamList = $inc WHERE email = '$userEmail'";
      $result3 = mysqli_query($con, $qu2);
      }

    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Please select any student ")';
      echo '</script>';
    }
  }

 if(isset($_POST['accept'])){
  $userEmail = $_SESSION['email'];
    $user_details_query70 = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
  $user23 = mysqli_fetch_array($user_details_query70);
  $parent = $user23['groupLeader'];
      $sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$parent'");
      $user1 = mysqli_fetch_array($sql);
      if($user1['teamList'] > 2){
        $qu111 = "UPDATE users SET commit = 3 WHERE email = '$parent'";
        $result211 = mysqli_query($con, $qu111);
      }
  $userEmail = $_SESSION['email'];
  $status = $_POST['accept'] ;
  $qu1 = "UPDATE users SET commit = 3 WHERE email = '$userEmail'";
  $result2 = mysqli_query($con, $qu1);

  }
   if(isset($_POST['reject'])){
      $userEmail = $_SESSION['email'];
      $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
      $user = mysqli_fetch_array($user_details_query);
      $parent = $user['groupLeader'];
      $sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$parent'");
      $user1 = mysqli_fetch_array($sql);
      $parent1=$user1['groupLeader'];
      $inc5 = $user1['teamList'] - 1;
      $que2 = "UPDATE users SET commit = 0 WHERE email = '$userEmail'";
      $result10 = mysqli_query($con, $que2);
      $que11 = "UPDATE users SET groupLeader = '$userEmail' WHERE email = '$userEmail'";
      $result11 = mysqli_query($con, $que11);
      $qu2 = "UPDATE users SET teamList = $inc5 WHERE email = '$parent'";
      $result3 = mysqli_query($con, $qu2);

      $qu1 = "UPDATE users SET commit = 0 WHERE teamList=$inc5   ";
      $result2 = mysqli_query($con, $qu1);
  }


//Mentor

  if(isset($_POST['addMentor'])){
    $userEmail = $_SESSION['email'];
    $user_details_query70 = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
    $user23 = mysqli_fetch_array($user_details_query70);
    $addMentor = $_POST['ment'];
    $useri = $user23['email'];

      if($addMentor != NULL){
         $userEmail = $_SESSION['email'];
         $user_details_query = mysqli_query($con, "SELECT * FROM mentor WHERE name = '$addMentor'");
         $user = mysqli_fetch_array($user_details_query);
         $mentor = $user['email'];
         // $inc = $user['teamList'] + 1;
         //   echo $inc;
         //    array_push($urTeam, $removeUser);
         //    $conv = $user['team'];
         //    $conv .= implode(';', $urTeam).',';
        //  $qu = "INSERT INTO users (team) VALUES ('$conv')";

        $user_details_query80 = mysqli_query($con, "SELECT * FROM users WHERE email = '$userEmail'");
        $user16 = mysqli_fetch_array($user_details_query80);

        $userN=$user16['email'];
         $qu = "UPDATE users SET mentor = '$mentor' WHERE groupLeader='$userN'";
         $result1 = mysqli_query($con, $qu);
         // $qu1 = "UPDATE mentor SET mentee = '$useri' WHERE name = '$addMentor'";
         // $result2 = mysqli_query($con, $qu1);
         $qu2 = "UPDATE users SET rmentor = 5 WHERE groupLeader='$userN'";
         $result3 = mysqli_query($con, $qu2);
         $qu22 = "UPDATE mentor SET req = 1 WHERE name = '$addMentor'";
         $result32 = mysqli_query($con, $qu22);
        //  $arr = explode(' ', $user['team']);
        // $_SESSION['art'] = $arr;

    }
    else{
      echo '<script language="javascript">';
      echo 'alert("Please select any Mentor ")';
      echo '</script>';
    }
  }




  if(isset($_POST['taccept'])){
  $userEmail = $_SESSION['email'];
  $acc = $_POST['acc'];
    $user_details_query70 = mysqli_query($con, "SELECT * FROM users WHERE name = '$acc'");
  $user23 = mysqli_fetch_array($user_details_query70);
  $parent = $user23['email'];
      $sql = mysqli_query($con,"SELECT * FROM users WHERE name = '$acc'");
      $user1 = mysqli_fetch_array($sql);
      // if($user1['teamList'] > 2){
      //   $qu111 = "UPDATE users SET commit = 3 WHERE email = '$parent'";
      //   $result211 = mysqli_query($con, $qu111);
      // }
  // $userEmail = $_SESSION['email'];
  // $status = $_POST['accept'] ;
  $qu19 = "UPDATE users SET mentor = '$userEmail' WHERE groupLeader = '$parent'";
  $result29 = mysqli_query($con, $qu19);
  $qu1 = "UPDATE users SET rmentor = 2 WHERE groupLeader = '$parent'";
  $result2 = mysqli_query($con, $qu1);

  }
   if(isset($_POST['treject'])){
      $userEmail = $_SESSION['email'];
      $acc = $_POST['acc'];
      $user_details_query = mysqli_query($con, "SELECT * FROM mentor WHERE email = '$userEmail'");
      $user = mysqli_fetch_array($user_details_query);
      $parent = $user['mentee'];
      $sql = mysqli_query($con,"SELECT * FROM users WHERE name = '$acc'");
      $user1 = mysqli_fetch_array($sql);
      $ss=$user1['email'];


      $que2 = "UPDATE users SET mentor = NULL WHERE mentor='$userEmail' AND groupLeader='$ss'";
      $result10 = mysqli_query($con, $que2);
      // $que11 = "UPDATE mentor SET mentee = NULL WHERE email = '$userEmail'";
      // $result3 = mysqli_query($con, $qu11);
      $qu13 = "UPDATE users SET rmentor = 0 WHERE rmentor=5 AND groupLeader='$ss'";
      $result23 = mysqli_query($con, $qu13);
      // $result3 = mysqli_query($con, $qu2);
  }


?>
