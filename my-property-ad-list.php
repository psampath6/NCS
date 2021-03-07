<?php

// session_start();

include ('login-user-check.php');

$svNkpUid = $_SESSION['SESSION_NKPUID'];

require_once ('dbcon.php');

$vQueryMySale = "SELECT * FROM `saleads` WHERE `nkpuid` = '$svNkpUid'  ";
$vResultMySale = mysqli_query($dbc, $vQueryMySale);
$vRowNumSale = mysqli_num_rows($vResultMySale);


$vQueryMyRent = "SELECT * FROM `rentads` WHERE `nkpuid` = '$svNkpUid'  ";
$vResultMyRent = mysqli_query($dbc, $vQueryMyRent);
$vRowNumRent = mysqli_num_rows($vResultMyRent);

mysqli_close($dbc);

?>


<!DOCTYPE html>
<html lang="en">

<head>

<title>My Property Ad. List <?php include ('title-tag.php'); ?></title>

  <?php 
    include ('head-tag.php');
  ?>

<script type="text/javascript">
function SaleViewModalSpin() 
{
      $('#LoadingSpinModal').modal('show');
      SpinStart();
}
</script>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row">
    
        <div class="col-md-6 col-md-offset-3 " >
      
          <h2 class="text-center" >My Property Ad. List</h2>
          

          <hr>

          <?php
            if ($vResultMySale) 
            {
              if ($vRowNumSale > 0) 
              {
          ?>
                <br>
                
                <h3>Property-for-Sale Ad(s).</h3>
                <?php
                while($rowSale = mysqli_fetch_assoc($vResultMySale))
                {
                ?>

                <div class="btn-default btn-lg " >
                  <a href="my-property-for-sale-ad-view.php?pid=<?php echo $rowSale['sapid']; ?>" onclick="SaleViewModalSpin();"  title="" >
                    <div class=" "  title="Property Description :- <?php echo ucfirst($rowSale['description']); ?> ">
                      <br>

<!--
btn btn-default btn-lg btn-block
                      Ad. Number :&nbsp;
                      <b><?php // echo $rowSale['sanum']; ?></b> 
-->

                      <span style="font-size:24px">
                      Title : 
                      <b><?php echo ucwords($rowSale['title']); ?></b> 
                      </span>
                      
                      <br>
                      Property ID : 
                      <b><?php  echo $rowSale['sapid']; ?></b> 

                      <br>
                      Ad. Post Date : 
                      <b>
                      <?php
                       echo date("d M Y", strtotime(substr($rowSale['sapid'], 0, 8))); 
                      ?>
                      </b> 
                      <br>
                      Ad. Photos/Pictures : 
                      <b><?php echo $rowSale['xc']; ?></b> 
                     <hr>
                      <div style="font-size:12px">
                        Click to View &amp; Edit / Delete Ad.
                      </div>
                    </div>
                  </a>
                </div>
                  
                  <br>
                  <hr>
          <?php
                }
               echo '<hr>';
              }
            }
          ?>

          <?php
            if ($vResultMyRent) 
            {
              if ($vRowNumRent > 0) 
              {
          ?>
                <br>
                
                <h3>Property-for-Rent Ad(s).</h3>
                <?php
                while($rowRent = mysqli_fetch_assoc($vResultMyRent))
                {
                ?>
                <div class="btn-default btn-lg btn-block." >
                  <a href="my-property-for-rent-ad-view.php?pid=<?php echo $rowRent['rapid']; ?>"  >
                    <div class=" " title="Property Description :- <?php echo ucfirst($rowRent['description']); ?>" >
                      <br>
<!--
                      Ad. Number :&nbsp;
                      <b><?php // echo $rowRent['ranum']; ?></b> 
-->

                      <span style="font-size:24px">
                      Title : 
                      <b><?php echo ucwords($rowRent['title']); ?></b> 
                      </span>

                      <br>
                      Property ID : 
                      <b><?php  echo $rowRent['rapid']; ?></b> 

                      <br>
                      Ad. Post Date : 
                      <b>
                      <?php
                       echo date("d M Y", strtotime(substr($rowRent['rapid'], 0, 8))); 
                      ?>
                      </b> 
                      <br>
                      Ad. Photos/Pictures : 
                      <b><?php echo $rowRent['xc']; ?></b> 
                      <hr>
                      <div style="font-size:12px">
                         Click to View &amp; Edit / Delete Ad.
                      </div>
                    </div>
                  </a>
                </div>
                
                  <br>
                  <hr>
          <?php
                }
                 echo '<hr>';
              }
            }
          ?>

          <?php
            if ( ($vRowNumSale == 0) && ($vRowNumRent == 0) )
            {
          ?>
              <br>
              <h3>
                <p class="redmybox">
                  <br>No Property Ad.<br><br>Posted Yet ..!<br>
                  <br>Hence Nothing to<br><br>List / Display.<br><br>
                </p>
              </h3>
              <br>
              <hr>
          <?php
            }
          ?>

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
          <br>
          <br>

  <?php 
    include ('modal-spin.php');
  ?>


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
