<?php

  include ('login-user-check.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

<?php
  include ('head-tag.php');
?>

<title>Post Property Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php
    include ('navbar-in.php');
  ?>


    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Post a Pod</h2>


                    <hr>

<!--
                    <label style="font-size:18px">i want to ...</label>
-->
                      <br>
                      <br>

                      <div class="btnbgc">
                        <a href="post-property-for-sale-ad.php" class="btn btn-info btn-lg btn-block">
                          <div style="color:black; padding:10px 0px 20px 0px;">
                            <h3>Post a Site<br><br>Pod-for-Sale</h3>
                          </div>
                        </a>
                      </div>

                      <br>

                      <hr>

                      <br>

                      <div class="btnbgc">
                        <a href="post-property-for-rent-ad.php" class="btn btn-warning btn-lg btn-block">
                          <div style="color:black; padding:10px 0px 20px 0px;">
                            <h3>Post a Site<br><br>Pod-for-Rent</h3>
                          </div>
                        </a>
                      </div>

                    <br>
                    <br>

                    <hr>

                    <br>
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
