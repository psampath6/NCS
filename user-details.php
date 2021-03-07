<?php 

  include ('login-user-check.php');
  
  $svNkpUid = $_SESSION['SESSION_NKPUID'];

  require_once ('dbcon.php');
  
  $vQueryUserDetails = "SELECT * FROM `nkpusers` WHERE `nkpuid` = '$svNkpUid' ";
  $vResultUserDetails = mysqli_query($dbc, $vQueryUserDetails);
  
  if($vResultUserDetails) 
  {
  
    if(mysqli_num_rows($vResultUserDetails) == 1) 
    {
      $vFetchUserDetails = mysqli_fetch_assoc($vResultUserDetails); 

      $vFirstNameUD = $vFetchUserDetails['firstname'];
      $vLastNameUD = $vFetchUserDetails['lastname'];
      $vMobileNrUD = substr($vFetchUserDetails['cellnum'],4);
      $vEmailidUD = $vFetchUserDetails['emailid'];
    } 
    else 
    {
    
    }
  } 
  else 
  {
    die("Query failed");
  }
  
  mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
    include ('head-tag.php');
  ?>

<title>Edit User Details <?php include ('title-tag.php'); ?></title>

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

          <form class="form" id="UserDetailsForm" name="UserDetailsForm" 
                      method="post" action="user-details-updated.php" >
          
            <div class="form-group">
              <label for="" class="">First Name</label> 
              <input class="form-control input-lg" id="FirstNameUD" name="FirstNameUD" 
                          type="text" placeholder=" First Name * " title="First Name" 
                          value="<?php echo $vFirstNameUD; ?>" maxlength="20" required >
            </div>
            
            <hr>
          
            <div class="form-group">
              <label for="" class="">Last Name</label> 
              <input class="form-control input-lg" id="LastNameUD" name="LastNameUD" 
                          type="text" placeholder=" Last Name " title="Last Name" 
                          value="<?php echo $vLastNameUD; ?>" maxlength="20"  >
            </div>
            
            <hr>

            <div class="form-group">
              <label for="" class="">Mobile Number</label> 
                <div class="input-group">
                  <span class="input-group-addon">+91</span>
                  <input class="form-control input-lg" id="MobileUD" name="MobileUD" 
                              type="text" placeholder=" Mobile Number " title="Mobile Number"  
                              value="<?php echo $vMobileNrUD; ?>" maxlength="10" >
                </div>
            </div>
            
            <hr>

            <div class="form-group">
              <label for="" class="">Email-ID (Username)</label> 
              <input class="form-control input-lg" id="EmailidUD" name="EmailidUD" 
                          type="text" placeholder=" Email-ID (Username) *" title="Email-ID (Username)"  
                          value="<?php echo $vEmailidUD; ?>" maxlength="40" required >
            </div>
            
            <hr>
            <br>
            
            <div class="form-group">
              <input type="hidden" name="UserDetailsHidden" value="TRUE" />
              <div class="btnbgc">
                <input class="btn btn-warning btn-lg btn-block" name="UserDetailsSubmit" 
                            type="submit" value="Update User Details" style="color:black">
              </div>
            </div>
            
          </form>

          <hr>
          <br>
            
          <div class="btnbgc">
            <a href="user-dashboard.php" class="btn btn-info btn-lg btn-block" style="color:black">
              Back to DashBoard
            </a>
          </div>

          <hr>
          
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


