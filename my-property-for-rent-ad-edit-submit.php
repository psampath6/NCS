<?php 

include ('login-user-check.php');


//  $vFlagRentEditStatus = 1;

if ( (isset($_POST['RentEditSubmit'])) && ($_POST['RentEditHidden'] == 'TRUE') )
{


//      $vFlagRentEditStatus = 2 ;

      $svNkpUid = $_SESSION['SESSION_NKPUID'];
      
      $svRentAdPid = $_SESSION['SESSION_RentAdPid'];

      $vRentEditPropType = $_POST['RentEditPropType'];
        
      $vRentEditPlace = $_POST['RentEditPlace'];

      $vRentEditUserType = $_POST['RentEditUserType'];

      require_once ('dbcon.php');

      if ($vRentEditPropType == '1')
      {

        $vRentEditBedroom = trim($_POST['RentEditBedroom']);

        $vRentEditBuiltSize = trim($_POST['RentEditBuiltSize']);
        $vRentEditBuiltSize = mysqli_real_escape_string($dbc, $vRentEditBuiltSize);

      }

      if ($vRentEditPropType == '2')
      {
      
        $vRentEditBedroom = trim($_POST['RentEditBedroom']);

        $vRentEditBuiltSize = trim($_POST['RentEditBuiltSize']);
        $vRentEditBuiltSize = mysqli_real_escape_string($dbc, $vRentEditBuiltSize);

      }

      if ($vRentEditPropType == '3')
      {
      
        $vRentEditBedroom = '-';
        
        $vRentEditBuiltSize = trim($_POST['RentEditBuiltSize']);
        $vRentEditBuiltSize = mysqli_real_escape_string($dbc, $vRentEditBuiltSize);

      }

      $vRentEditUnit = trim($_POST['RentEditUnit']);

      $vRentEditDepositAmt = trim($_POST['RentEditDepositAmt']);
      $vRentEditDepositAmt = mysqli_real_escape_string($dbc, $vRentEditDepositAmt);
      
      $vRentEditRentAmt = trim($_POST['RentEditRentAmt']);
      $vRentEditRentAmt = mysqli_real_escape_string($dbc, $vRentEditRentAmt);
      
      $vRentEditCPName = trim($_POST['RentEditCPName']);
      $vRentEditCPName = mysqli_real_escape_string($dbc, $vRentEditCPName);
      
      $vRentEditCPNumber = trim($_POST['RentEditCPNumber']);
      $vRentEditCPNumber = mysqli_real_escape_string($dbc, $vRentEditCPNumber);
      
      $vRentEditCPEmailid = trim($_POST['RentEditCPEmailid']);
      $vRentEditCPEmailid = mysqli_real_escape_string($dbc, $vRentEditCPEmailid);
      
      $vRentEditAddress = trim($_POST['RentEditAddress']);
      $vRentEditAddress = mysqli_real_escape_string($dbc, $vRentEditAddress);
      
      $vRentEditTitle = trim($_POST['RentEditTitle']);
      $vRentEditTitle = mysqli_real_escape_string($dbc, $vRentEditTitle);
      
      $vRentEditDescription = trim($_POST['RentEditDescription']);
      $vRentEditDescription = mysqli_real_escape_string($dbc, $vRentEditDescription);

      $vRentEditSmm = str_replace(',', '', $vRentEditRentAmt); 


      $vQueryRentEditUpdate = "UPDATE `rentads` 
        SET 
        `place` =  '$vRentEditPlace', 
        `pt` = '$vRentEditPropType', 
        `ut` = '$vRentEditUserType', 
        `built` = '$vRentEditBuiltSize', 
        `su` = '$vRentEditUnit', 
        `nb` = '$vRentEditBedroom', 
        `deposit` = '$vRentEditDepositAmt', 
        `rent` = '$vRentEditRentAmt', 
        `cname` = '$vRentEditCPName', 
        `cnumber` = '$vRentEditCPNumber', 
        `cemail` = '$vRentEditCPEmailid', 
        `address` = '$vRentEditAddress', 
        `title` = '$vRentEditTitle', 
        `description`  = '$vRentEditDescription', 
        `smm` = '$vRentEditSmm' 
        WHERE `rapid` = '$svRentAdPid' "; 

//        `nkpuid` = '$svNkpUid', 

    
      $vResultRentEditUpdate = mysqli_query($dbc, $vQueryRentEditUpdate);

        if ($vResultRentEditUpdate)
        { 

        }
        else
        {
          // echo 'Query Failed ...!';
          trigger_error("Query failed...");
        }
        

      mysqli_close($dbc);
  
        header("Location: my-property-for-rent-ad-edit-success.php");
        exit;

}
?> 

<!--

<!DOCTYPE html>
<html lang="en">

<head>

<?php 
    include ('head-tag.php');
?>

<title>Edit Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row">
    
        <div class="col-md-6 col-md-offset-3 " >
      
          <h2 class="text-center" >Edit Property-for-Rent Ad.</h2>
          
          
          <hr>
          <hr>
          
          <?php 
            if ($vFlagRentEditStatus == 0) 
            {
          ?>   
              <h4>
                
                <p class="redmybox">
                  <br>
                  <br>
                  <?php 
                      echo $vFlagRentEditStatusErrMsg;
                  ?> 
                  <br><br>
                  Your <br>Property-for-Rent<br>Advertisement was<br>
                  <b>NOT</b> edited properly.<br><br>Please try again..!
                  <br>
                  <br><br>
                </p>
                
              </h4>
              
              <hr>
              <hr>
              
              <div class="btnbgc">
              <button class="btn btn-danger btn-lg btn-block" onclick="window.history.back();">Click to go Back</button> 
              </div>
            
          <?php 
             }
          ?> 
             
          <hr>
          <hr>
          
          
          <br>
          <br>

        </div>
        
      </div>

    </div>

  </div>

  
  <?php 
    include ('footer.php');
  ?>

</body>

</html>

-->

      <!-- /.row -->
    <!-- /.container -->
  <!-- /.section-colored -->
