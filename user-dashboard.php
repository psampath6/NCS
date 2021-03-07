<?php

  include ('login-user-check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>Dashboard <?php include ('title-tag.php'); ?></title>

<?php 
  include ('head-tag.php');
?>

<script type="text/javascript">
function ManageDashBoardModalSpin() 
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
  
    <div class="section-colored text-center center-block">

      <div class="container">

        <div class="row">
      
          <div class="col-md-6 col-md-offset-3 " >
        
            <h2 class="text-center" >User Dashboard</h2>
            
            
              <hr>
              
              <br>

              <br>

<!--  
            <div class="">
            </div>
--> 
            
              <div class="btnbgc">
                <a href="post-property-ad.php" class="btn btn-primary btn-lg btn-block"  >
                  <div style="padding:10px 0px 20px 0px;">
<!-- 
                    <h3>Post &nbsp;a <br><br>Property Ad.</h3>
--> 
                    <h3><br>Post Property Ad.<br><br></h3>
                  </div>
                </a>
              </div>
              
              <br>

              <hr>

              <br>

              <div class="btnbgc">
                <a href="my-property-ad-list.php" class="btn btn-danger btn-lg btn-block" 
                      title="List / View & Edit / Delete Posted Ads." onclick="ManageDashBoardModalSpin();" >
                  <div style="padding:10px 0px 20px 0px; color:black.;">
<!-- 
                    <h3>Manage <br><br>posted Ad(s).</h3>
--> 
                    <h3><br>Manage posted Ad.<br><br></h3>
                  </div>
                </a>
              </div>

             <br>
             <br>
              
            <hr>
            
            <br>

<!--  

              <div class="btnbgc">
                <a href="post-property-for-sale-ad.php" class="btn btn-info btn-lg btn-block">
                  <div style="margin:0px 0px 20px 0px; color:black; ">
                    <h3>Post an Ad. for<br>Property-for-Sale</h3>
                  </div>
                </a>
              </div>
              
              <br>

              <hr>

              <br>

              <div class="btnbgc">
                <a href="post-property-for-rent-ad.php" class="btn btn-warning btn-lg btn-block">
                  <div style="margin:0px 0px 20px 0px; color:black; ">
                    <h3>Post an Ad. for<br>Property-for-Rent</h3>
                  </div>
                </a>
              </div>

              <br>

              <hr>

              <br>
--> 


<!--              
              <div class="btnbgc">
                <a href="change-password.php" class="btn btn-success btn-lg btn-block">
                  <div style="color:black; margin:-10px 0px 0px 0px;">
                    <h3>Change PassWord</h3>
                  </div>
                </a>
              </div>
              
              <hr>
              
              <div class="btnbgc">
                <a href="user-details.php" class="btn btn-warning btn-lg btn-block">
                  <div style="color:black; margin:-10px 0px 0px 0px;">
                    <h3>Edit User Details</h3>
                  </div>
                </a>
              </div>

            
            <hr>
-->            
            
            <br>
            <br>
            <br>
            
          </div>

  <?php 
    include ('modal-spin.php');
  ?>


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
