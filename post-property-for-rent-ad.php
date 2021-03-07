<?php

// session_start();

include ('login-user-check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    include ('head-tag.php');
  ?>

  <title>Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

  <style>
  .type123 {
  border: 2px  solid; 
  border-radius: .5em;
  padding: 20px 0px 20px 0px; 
  background-color: #EEEEEE;
  }
  </style>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row ">
            
                <div class="col-md-6 col-md-offset-3 " >
                
                    <h2 class="text-center" >Post Property-for-Rent Ad.</h2>

                    <hr>

                    <h4>Select the Type of Property</h4>
                    
                    <hr>
                        
                    <form class="form">
                    
                      <div class="form-group">
                        <h3 style="font-weight:bold"><a href="post-property-for-rent-ad-type-1.php">
                          <div class="type123" >Residential House / Bungalow / Villa</div></a></h3>
                      </div>

                      <hr>
                      
                      <div class="form-group">
                        <h3 style="font-weight:bold"><a href="post-property-for-rent-ad-type-2.php">
                          <div class="type123" >Multi-Storey Apartment / Flat</div></a></h3>
                      </div>
                      
                      <hr>

                      <div class="form-group">
                        <h3 style="font-weight:bold"><a href="post-property-for-rent-ad-type-3.php">
                          <div class="type123" >Commercial Building / Office Space</div></a></h3>
                      </div>
                      
                    </form>
                    
                    <hr>
                    <br>
                    
                    <div class="btnbgc">
                      <a href="user-dashboard.php" class="btn btn-warning btn-lg btn-block" style="color:black">
                        Back to DashBoard
                      </a>
                    </div>

                    <br>
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
