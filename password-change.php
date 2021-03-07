<?php

include ('login-user-check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    include ('head-tag.php');
  ?>

  <title>Password Change <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row ">
    
        <div class="col-md-6 col-md-offset-3 " >
        
            <h2 class="text-center" >Password Change</h2>
            
            
            <hr>

            <form class="form" id="ChangePassWordForm" name="ChangePassWordForm" 
                        method="post" action="password-change-success.php" >

              <div class="form-group">
                <label for="" class="">Enter New Password</label> 
                <input class="form-control input-lg" id="ChangePassWord" name="ChangePassWord"
                            type="password" placeholder=" New Password * (Min. 4 & Max. 20 chars.)" 
                            title="New Password (Min. 4 & Max. 20 chars.)" maxlength="20" autofocus required >
              </div>
              
              <hr>

              <div class="form-group">
                <label for="" class="">Confirm New Password</label> 
                <input class="form-control input-lg" id="ConfirmChange" name="ConfirmChange" 
                    type="password" placeholder=" Confirm New Password * " 
                    title="Confirm New Password" maxlength="20" required >
              </div>
              
              
              <hr>
              <br>
              
              <div class="form-group  ">
                <input type="hidden" name="ChangePassWordHidden" value="TRUE" /> 
                <div id="" class="btnbgc">
                  <input class="btn btn-success btn-lg btn-block" name="ChangePassWordSubmit" 
                              type="submit" value="Change Password"  style="color:black" />
                </div>
              </div>

            </form>

            <br>
            <hr>
            <br>
            
            <div class="btnbgc">
              <a href="user-dashboard.php" class="btn btn-info btn-lg btn-block" style="color:black">
                Back to DashBoard
              </a>
            </div>

            <br>
            <hr>
              

            <br>
            <br>
            <br>

        </div>
        
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

  </div>
  <!-- /.section-colored -->


  <?php 
    include ('footer.php');
  ?>

</body>

</html>
