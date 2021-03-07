<?php
  session_start();
/*
  $_SESSION = array();
  session_destroy();
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

<title>Search Properties <?php include ('title-tag.php'); ?></title>

<style>
</style>


</head>

<body>

  <?php
    if  (isset($_SESSION['SESSION_NKPUID'])) {
      include ('navbar-in.php'); }
    else {
      include ('navbar.php'); }
  ?>


    <div class="section-colored  center-block text-center  ">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Search for a Solution</h2>


                    <hr>
                    <br>

                    <label style="font:18px normal">I want to ...</label>

                    <br>
                    <br>

                    <div class="btnbgc">
                      <a href="search-property-for-sale.php"  class="btn btn-primary btn-lg btn-block" >
                        <div style="color:black.">
                          <h2 style="font-size:26px"><b>Search a Pod</b></h2>
                          <h3 style="font-size:18px">(Search Pods-Sites)</h3>
                          <br>
                        </div>
                      </a>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="btnbgc">
                      <a href="search-property-for-rent.php"  class="btn btn-danger btn-lg btn-block" >
                        <div style="color:black.">
                          <h2 style="font-size:26px"><b>Rent a Pod</b></h2>
                          <h3 style="font-size:18px">(Search Pod-for-rent)</h3>
                          <br>
                        </div>
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
