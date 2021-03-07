<?php 

include ('login-user-check.php');

  $vUDFlag = 1;

  if (isset($_POST['UserDetailsSubmit']))
  {

    require_once ('dbcon.php');

    $svNkpUid = $_SESSION['SESSION_NKPUID'];

/*
    $vQueryUpdateEmailBlank = "UPDATE `nkpusers` 
                                                SET `emailid` = '' 
                                                WHERE `nkpuid` = '$svNkpUid'  "; 

    mysqli_query($dbc, $vQueryUpdateEmailBlank);
*/

    $vEmailidUD = trim(strtolower($_POST['EmailidUD']));
    $vEmailidUD = mysqli_real_escape_string($dbc, $vEmailidUD);

    $vQueryVerifyEmailUD = "SELECT * FROM `nkpusers` WHERE `emailid` = '$vEmailidUD' AND `nkpuid` != '$svNkpUid' ";
    $vResultVerifyEmailUD = mysqli_query($dbc, $vQueryVerifyEmailUD);
    
    if (mysqli_num_rows($vResultVerifyEmailUD) == 1)
    {
      $vUDFlag = 0;
    }

    if (mysqli_num_rows($vResultVerifyEmailUD) == 0)
    { 
    
      $vUDFlag = 2;

      $vFirstNameUD = trim($_POST['FirstNameUD']);
      $vFirstNameUD = mysqli_real_escape_string($dbc, $vFirstNameUD);

      $vLastNameUD = trim($_POST['LastNameUD']);
      $vLastNameUD = mysqli_real_escape_string($dbc, $vLastNameUD);

      $vMobileUD = trim($_POST['MobileUD']);
      $vMobileUD = mysqli_real_escape_string($dbc, $vMobileUD);
      if ($vMobileUD != '') $vMobileUD = '+91-' . $vMobileUD ;

      $vEmailidUD = trim(strtolower($_POST['EmailidUD']));
      $vEmailidUD = mysqli_real_escape_string($dbc, $vEmailidUD);

      $vQueryUpdateUD = "UPDATE `nkpusers` SET 
                                      `firstname` = '$vFirstNameUD' , 
                                      `lastname` = '$vLastNameUD' , 
                                      `cellnum` = '$vMobileUD' , 
                                      `emailid` = '$vEmailidUD' 
                                      WHERE `nkpuid` = '$svNkpUid'  ";

      mysqli_query($dbc, $vQueryUpdateUD);

      mysqli_close($dbc);

    }

  }
  else
  {
    header("Location: login.php");
    exit;
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    include ('head-tag.php');
  ?>

<title>User Details Updated <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

    <div class="row">
    
        <div class="col-md-6 col-md-offset-3 " >
      
          <h2 class="text-center" >Edit User Details</h2>
          
          <hr>
          <hr>

          <?php
          if ($vUDFlag == 0) 
          {
          ?>
            <h3>
              <p class="redmybox">
                <br> Some One has <br>
                <br> already chosen that  <br>
                <br> Email-id (UserName). <br>
                <br>
                <br> Please try another <br>
                <br> Email-id (UserName). <br>
                <br>
              </p>
            </h3>

            <hr>
            <hr>
            
            <div class="btnbgc">
              <button class="btn btn-warning btn-lg btn-block" style="color:black"
                            onclick="window.history.back(); ">
                            Click to go Back
              </button>
            </div>
          <?php
          }
          ?>

          <?php
          if ($vUDFlag == 2) 
          {
          ?>
            <h3>
            <p class="greenmybox">
            <br> <br>
              Your Details<br><br>have been<br><br>Updated<br><br>Successfully<br>
             <br><br>
            </p>
            </h3>
          <?php
          }
          ?>

          <hr>
          <hr>
          
          <div class="btnbgc">
            <a href="user-dashboard.php" class="btn btn-success btn-lg btn-block"  style="color:black">
              Go to DashBoard
            </a>
          </div>

          <hr>
          <hr>
            
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
