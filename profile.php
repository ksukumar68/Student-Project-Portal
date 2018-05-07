
<?php
  include 'header.php';
?>



<div class="register" style="color:white;font-size:20px;" id="signin" align="center">
		<div class="container">
			<div class="gallery-top">
                <div class="agileinfo_gallery_top">
                    <form class="form-horizontal" role="form" action="signin.php" method="post">
                    <div class="col-md-6" align="right">
                        <img src="images/14.png"/>
                    </div>
                    <div class="col-md-"6 align="left">
                     
                          Name:   <b><?php echo $user['name']; ?></b><br>
                          
                          Email:  <b><?php echo $user['email']; ?></b><br>
                   
                          Branch:  <b><?php echo $user['branch']; ?></b><br>
                        
                          You are:  <b><?php echo $user['your']; ?></b><br>

                    </div>
                    </form>
                </div>
              </div>  
		    </div>
		 <div class="clearfix"> </div>
           
</div>

<?php  if($user['commit'] != 3 ){ ?>
<div class="col-md-12" style="background:black">
    <div class="gallery-top">
    <div class="agileinfo_gallery_top">
    <h3><strong>Select students for ur project</strong></h3>
    <?php
//    $sql = "SELECT name FROM users";
//    $result = $con->query($sql);

  //  if ($result->num_rows > 0) {
        // output data of each row
  //      while($row = $result->fetch_assoc()) {
  //          array_push($totalUsers, $row['name'] );
  //      }
  //  } else {
  //      echo "0 results";
  //  }

    ?>
  <!-- <div class="col-md-4"> -->
  <form action="profile.php" method="post">
    <div class="form-group">
      <select multiple class="form-control" id="sel2" name="data">
        <?php
        $sql = "SELECT name FROM users WHERE commit = 0";
         $result = $con->query($sql);
         foreach ($result as $key) {?>
           <option><?php echo $key['name']; ?></option>
           <?php
         }
        ?>
      </select>

    </div>
  <!-- </form> -->
<!-- </div> -->
<!-- <div class="col-md-4"> -->
<button type="submit" class="btn btn-success" name="add" <?php if ($user['teamList'] == 4){ ?> disabled <?php   } ?> >ADD</button>
<button type="submit" id="rem" class="btn btn-danger" name="remove"  >REMOVE</button>
  <!-- <form> -->
    <div class="form-group">
      <select multiple class="form-control" id="sel2" name="datar">
        <?php
        $sql = "SELECT * FROM users WHERE groupLeader = '$userEmail'";
         $result = $con->query($sql);
         foreach ($result as $key) {?>
           <option id="suku"><?php echo $key['name']; ?></option>
           <?php
         }
        ?>

      </select>
    </div>
  </form>
<!-- </div> -->
</div></div></div>
<?php } else{ ?>
<?php

  // $friend = $user['groupLeader'];
  // $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$friend'");
  // $us = mysqli_fetch_array($user_details_query);

?>
<div class="col-md-12" style="background:black">
     <div class="gallery-top">
     <div class="agileinfo_gallery_top">
      <br>
        <h3 style="color:white"><strong>Team Members</strong></h3>
      <br>
        <?php
        $friend = $user['groupLeader'];
        $sql = "SELECT name FROM users WHERE groupLeader = '$friend' AND commit = 3";
         $result = $con->query($sql);
         foreach ($result as $key) {?>
           <div class="panel panel-default">
            <div class="panel-body"><?php echo $key['name']; ?></div>
          </div>
           <?php
         }
        ?>
    </div></div>
</div>
<?php } ?>

<?php  if($user['commit'] == 2){ ?>
<?php

$friend = $user['groupLeader'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$friend'");
    $us = mysqli_fetch_array($user_details_query);


?>
<div class="col-md-12" style="background:black;color:white">
     <div class="gallery-top" style="background:orange;color:white">
     <div class="agileinfo_gallery_top">
         
          <h2><?php echo $us['name']; ?> send u a group request<br><br>
            <form action="profile.php" method="post">
              <input type="hidden" value="accept" name="accept" />
              <button type="submit" class="btn btn-primary" name="accept">Accept</button>
            </form><br>
            <form action="profile.php" method="post">
              <input type="hidden" value="reject" name="reject" />
              <button type="submit" class="btn btn-danger" name="reject">Reject</button>
            </form><br>
            </h2>
          </div>
    </div></div>
<?php } ?>
<?php if($user['commit']==3  && $user['rmentor']==5){?>

<?php
$friend = $user['groupLeader'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$friend'");
    $us = mysqli_fetch_array($user_details_query);

    $mentor = $user['mentor'];
    $user_details = mysqli_query($con, "SELECT name FROM mentor WHERE email = '$mentor'");
    $uss = mysqli_fetch_array($user_details);

 ?>
<?php if ($user['teamList']==4) {?>
<div class="col-md-12" style="background:black;color:white;font-size:20px;">
     <div class="gallery-top" style="background:orange;">
     <div class="agileinfo_gallery_top">
     <p>You have sent a group request to</b> <?php echo $uss['name']; ?></strong></p>
</div></div>
<?php  } else { ?>
<div class="col-md-12" style="background:black;color:white;font-size:20px;">
     <div class="gallery-top" style="background:orange;">
     <div class="agileinfo_gallery_top">

        <p><strong><?php echo $us['name'];?></strong> has sent a group request to <strong><?php echo $uss['name']; ?></strong></p>
</div></div></div></div>
<?php } ?>









<?php  } ?>

<?php  if($user['teamList'] == 4 && $user['rmentor'] == 0  && $user['commit'] == 3){ ?>
<?php

$friend = $user['groupLeader'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$friend'");
    $us = mysqli_fetch_array($user_details_query);


?>
<div class="col-md-12" style="background:black">
          <div class="gallery-top" style="background:orange">
          <div class="agileinfo_gallery_top">
          <h3><strong>Mentors</strong></h3>
            <form action="profile.php" method="post">
              <select multiple class="form-control" id="sel2" name="ment" >
                <?php
                 $sql = "SELECT name FROM mentor";
                 $result = $con->query($sql);
                 foreach ($result as $key) {?>
              <option  ><?php echo $key['name']; ?></option>
              <?php
                }
              ?>
              </select><br>
              <button type="submit" class="btn btn-primary"  <?php if ($user['rmentor'] == 1 ){ ?> disabled <?php   } ?> name="addMentor">Send</button>
            </form>
            </h2>
          </div>
        </div>
   </div>
<?php } ?>



<!-- Who is your mentor -->

<?php  if($user['rmentor'] == 2){ ?>
<?php

    $mentor = $user['mentor'];
    $user_details_query = mysqli_query($con, "SELECT name FROM mentor WHERE email = '$mentor'");
    $us = mysqli_fetch_array($user_details_query);


?>
<div class="col-md-12" style="background:black">
    <div class="gallery-top" style="background:orange">
        <div class="agileinfo_gallery_top" style="background:orange">
            <h4><?php echo $us['name']; ?> is your mentor for this semester project</h4>
        </div>
    </div>
</div>

<?php } ?>



</div>

</div>
<script type="text/javascript">
  $('#suku').on('click', function() {
    $('#rem').prop('disabled', false);
});​
</script>
  </body>
</html>

<?php
  include 'footer.php'
?>
