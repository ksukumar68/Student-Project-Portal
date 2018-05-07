
<?php
  include 'header1.php';
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
                   
    

                    </div>
                    </form>
                </div>
              </div>  
		    </div>
		 <div class="clearfix"> </div>
           
</div>

<?php  if($user['req'] != 0){ ?>
<?php  

$friend = $user['mentee'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$friend'");
    $us = mysqli_fetch_array($user_details_query);
    // $user_details_query1 = mysqli_query($con, "SELECT * FROM users WHERE mentor = '$userEmail' AND rmentor = 1 AND teamList = 4 ");
    // $us1 = mysqli_fetch_array($user_details_query1);

?>
<div class="col-md-6" style="background:black">
    <div class="gallery-top">
        <div class="agileinfo_gallery_top">
              <h3><strong>New Request</strong></h3>
              <h2><?php
            $sql = "SELECT name FROM users WHERE mentor = '$userEmail' AND rmentor = 5 AND teamList = 4";
             $result = $con->query($sql);
             foreach ($result as $key) {?>
               <p><?php echo $key['name']; ?> send u a project request <form action="mentor.php" method="post"> <br>
                  <input type="text" name="acc" hidden value="<?php echo $key['name']; ?>" >
                  <button type="submit" class="btn btn-primary" name="taccept">Accept</button>
                  <button type="submit" class="btn btn-danger" name="treject">Reject</button>
                </form></p>
               <?php
             }
            ?>
                
            </h2>
    </div></div>
</div>

  

        <!-- <?php
        $sql = "SELECT name FROM users WHERE mentor = '$userEmail' AND rmentor = 5 AND teamList = 4";
         $result = $con->query($sql);
         foreach ($result as $key) {?>
           <p><?php echo $key['name']; ?>Send you a group request</p>
           <?php
         }
        ?> -->

              

<?php } ?>


<div class="col-md-6" style="background:black">
<div class="gallery-top">
    <div class="agileinfo_gallery_top">
        <h3><strong>Mentee</strong></h3>
      <form action="profile.php" method="post">
        <div class="form-group">
          <select multiple class="form-control" id="sel2" name="data">
            <?php
            $sql = "SELECT * FROM users WHERE mentor = '$userEmail'";
             $result = $con->query($sql);
             foreach ($result as $key) {?>
               <option <?php if ($key['teamList'] == 4){ ?> style="color:  red;" <?php   } ?>><?php echo $key['name']; ?></option>
               <?php
             }
            ?>
          </select>

        </div>
    </form>

    </div> 
</div></div>
</div>
</div>
</div>
  </body>
</html>

<?php
  include 'footer.php';
?>