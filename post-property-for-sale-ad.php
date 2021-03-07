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

  <title>Post Property-for-Sale Ad. <?php include ('title-tag.php'); ?></title>

  <style>
  .type1234 {
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

            <div class="row">

                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Post Pod-for-Sale</h2>


                    <hr>

                    <h4>Select the Type of Pod</h4>

                    <hr>

                    <form class="form">

                      <div class="form-group">
                        <h3 style="font-weight:bold">
                          <a href="post-property-for-sale-ad-type-1.php">
                          <div class="type1234" >Small Site</div></a></h3>
                      </div>

                      <hr>

                      <div class="form-group">
                        <h3 style="font-weight:bold">
                          <a href="post-property-for-sale-ad-type-2.php">
                          <div class="type1234" >Multi Site Pod</div></a></h3>
                      </div>

                      <hr>

                      <div class="form-group">
                        <h3 style="font-weight:bold">
                          <a href="post-property-for-sale-ad-type-3.php">
                          <div class="type1234" >Single Tenant</div></a></h3>
                      </div>

                      <hr>

                      <div class="form-group">
                        <h3 style="font-weight:bold">
                          <a href="post-property-for-sale-ad-type-4.php">
                          <div class="type1234" >Multi Tenant Site</div></a></h3>
                      </div>

                    </form>

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
