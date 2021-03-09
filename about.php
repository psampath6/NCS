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

                    <h2 class="text-center" >About Me</h2>


                    <hr>
                    <br>

                    <label style="font:18px normal">Pradeep has over 20 years of Internet Engineering experience. He has worked at companies like Cisco, Alcatel, NTT Docomo, Ixia and Spirent. He has also worked for research institutions like Indian Institute of Science and Indian Space Research Organization, Bangalore. Pradeep holds a Masters in Electrical & Computer Engineering from California State University Northridge and Bachelors Degree in Electronics and Communications from Malnad College of Engineering India.</label>

                    <br>
                    <br>

                    
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
