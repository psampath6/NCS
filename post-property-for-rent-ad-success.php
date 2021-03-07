<?php

//  session_start();

include ('login-user-check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    include ('head-tag.php');
  ?>

<title>Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row">
            
                <div class="col-md-6 col-md-offset-3 " >
                
                    <h2 class="text-center" >Property-for-Rent Ad.</h2>
                    
                    
                    <hr>
                    
                    <h3 class="greenmybox">
                        <br>
                      <span style="font-weight:bold">
                        Your
                      </span>
                        <br><br>
                        Property-for-Rent  
                        <br><br>
                      <span style="font-weight:bold">
                        Advertisement 
                      </span>
                        <br><br>
                      has been Posted 
                        <br><br>
                      <span style="font-weight:bold">
                        Successfully ...!
                      </span>
                        <br><br>
                    </h3>
                    
                    <hr>
                    
                    <div id="" class="btnbgc">
                      <a href="user-dashboard.php"  class="btn btn-success btn-lg btn-block"  style="color:black">
                        Back to DashBoard
                      </a>
                    </div>
                    
                    <hr>

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

