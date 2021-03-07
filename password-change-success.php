<?php

include ('login-user-check.php');

  if (isset($_POST['ChangePassWordSubmit']))
  {

    require_once ('dbcon.php');
    
    $svNkpUid = $_SESSION['SESSION_NKPUID'];
    
    $vChangePassWord = trim($_POST['ChangePassWord']);
    $vChangePassWord = mysqli_real_escape_string($dbc, $vChangePassWord);

    $vQueryChangePassWord = "UPDATE `nkpusers` 
                                                SET `password` = '$vChangePassWord' 
                                                WHERE `nkpuid` = '$svNkpUid' ";

    mysqli_query($dbc, $vQueryChangePassWord);
    
    mysqli_close($dbc);

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

<title>PassWord Changed <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row">
    
        <div class="col-md-6 col-md-offset-3 " >
      
          <h2 class="text-center" >PassWord Change</h2>
          
          
          <hr>
          <br>

          <h3>
          <p class="greenmybox">
            <br> <br>
              Your <b>PassWord</b><br><br>has been<br><br><b>Changed</b><br><br>Successfully !<br> 
            <br> <br>
          </p>
          </h3>

          <br>
          <hr>
          
          <div class="btnbgc">
            <a href="user-dashboard.php" class="btn btn-warning btn-lg btn-block" 
                  style="color:black">
              Back to Dashboard
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
