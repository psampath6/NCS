<?php 

 include ('login-user-check.php');


//  $vFlagSaleEditStatus = 1;

if ( (isset($_POST['SaleEditSubmit'])) && ($_POST['SaleEditHidden'] == 'TRUE') )
{

//      $vFlagSaleEditStatus = 2 ;

      $svNkpUid = $_SESSION['SESSION_NKPUID'];
      
      $svSaleAdPid = $_SESSION['SESSION_SaleAdPid'];

      $vSaleEditPropType = $_POST['SaleEditPropType'];
        
      $vSaleEditPlace = $_POST['SaleEditPlace'];

      $vSaleEditUserType = $_POST['SaleEditUserType'];

      require_once ('dbcon.php');

      if ($vSaleEditPropType == '1')
      {
      
        $vSaleEditBedroom = '-';

        $vSaleEditBuiltSize = '-';

        $vSaleEditLandSize = trim($_POST['SaleEditLandSize']);
        $vSaleEditLandSize = mysqli_real_escape_string($dbc, $vSaleEditLandSize);

      }

      if ($vSaleEditPropType == '2')
      {
      
        $vSaleEditBedroom = trim($_POST['SaleEditBedroom']);

        $vSaleEditBuiltSize = trim($_POST['SaleEditBuiltSize']);
        $vSaleEditBuiltSize = mysqli_real_escape_string($dbc, $vSaleEditBuiltSize);

        $vSaleEditLandSize = '-';

      }

      if ($vSaleEditPropType == '3')
      {

        $vSaleEditBedroom = trim($_POST['SaleEditBedroom']);

        $vSaleEditBuiltSize = trim($_POST['SaleEditBuiltSize']);
        $vSaleEditBuiltSize = mysqli_real_escape_string($dbc, $vSaleEditBuiltSize);

        $vSaleEditLandSize = trim($_POST['SaleEditLandSize']);
        $vSaleEditLandSize = mysqli_real_escape_string($dbc, $vSaleEditLandSize);

      }


      if ($vSaleEditPropType == '4')
      {

        $vSaleEditBedroom = '-';
        
        $vSaleEditBuiltSize = trim($_POST['SaleEditBuiltSize']);
        $vSaleEditBuiltSize = mysqli_real_escape_string($dbc, $vSaleEditBuiltSize);

        $vSaleEditLandSize = trim($_POST['SaleEditLandSize']);
        $vSaleEditLandSize = mysqli_real_escape_string($dbc, $vSaleEditLandSize);

      }


      $vSaleEditUnit = trim($_POST['SaleEditUnit']);

      $vSaleEditRate = trim($_POST['SaleEditRate']);
      $vSaleEditRate = mysqli_real_escape_string($dbc, $vSaleEditRate);
      
      $vSaleEditPrice = trim($_POST['SaleEditPrice']);
      $vSaleEditPrice = mysqli_real_escape_string($dbc, $vSaleEditPrice);
      
      $vSaleEditCPName = trim($_POST['SaleEditCPName']);
      $vSaleEditCPName = mysqli_real_escape_string($dbc, $vSaleEditCPName);
      
      $vSaleEditCPNumber = trim($_POST['SaleEditCPNumber']);
      $vSaleEditCPNumber = mysqli_real_escape_string($dbc, $vSaleEditCPNumber);
      
      $vSaleEditCPEmailid = trim($_POST['SaleEditCPEmailid']);
      $vSaleEditCPEmailid = mysqli_real_escape_string($dbc, $vSaleEditCPEmailid);
      
      $vSaleEditAddress = trim($_POST['SaleEditAddress']);
      $vSaleEditAddress = mysqli_real_escape_string($dbc, $vSaleEditAddress);
      
      $vSaleEditTitle = trim($_POST['SaleEditTitle']);
      $vSaleEditTitle = mysqli_real_escape_string($dbc, $vSaleEditTitle);
      
      $vSaleEditDescription = trim($_POST['SaleEditDescription']);
      $vSaleEditDescription = mysqli_real_escape_string($dbc, $vSaleEditDescription);

      $vSaleEditSmm = str_replace(',', '', $vSaleEditPrice); 

      
      $vQuerySaleEditUpdate = "UPDATE `saleads` 
        SET 
        `place` =  '$vSaleEditPlace', 
        `pt` = '$vSaleEditPropType', 
        `ut` = '$vSaleEditUserType', 
        `built` = '$vSaleEditBuiltSize', 
        `land` = '$vSaleEditLandSize', 
        `su` = '$vSaleEditUnit', 
        `nb` = '$vSaleEditBedroom', 
        `rate` = '$vSaleEditRate', 
        `price` = '$vSaleEditPrice', 
        `cname` = '$vSaleEditCPName', 
        `cnumber` = '$vSaleEditCPNumber', 
        `cemail` = '$vSaleEditCPEmailid', 
        `address` = '$vSaleEditAddress', 
        `title` = '$vSaleEditTitle', 
        `description`  = '$vSaleEditDescription', 
        `smm` = '$vSaleEditSmm' 
        WHERE `sapid` = '$svSaleAdPid' "; 

    //        `nkpuid` = '$svNkpUid', 

      $vResultSaleEditUpdate = mysqli_query($dbc, $vQuerySaleEditUpdate);

        if ($vResultSaleEditUpdate)
        { 

        }
        else
        {
          // echo 'Query Failed ...!';
          trigger_error("Query failed...");
        }
        

      mysqli_close($dbc);
  
        header("Location: my-property-for-sale-ad-edit-success.php");
        exit;

//    if ($vFlagSaleEditStatus == 2)     {      }
  
}

/*
else 
{
  include ('login-user-check.php');
}
*/
?> 

<!--

<!DOCTYPE html>
<html lang="en">

<head>

<?php 
    include ('head-tag.php');
?>

<title>Edit Property-for-Sale Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row ">
      
        <div class="col-md-6 col-md-offset-3 " >
    
          <h2 class="text-center" >Edit Property-for-Sale Ad.</h2>
          
          
          <hr>
          <hr>
          
          <?php 
              if ($vFlagSaleEditStatus == 1) 
              {
          ?>   
              <h4>
              <p class="redmybox">
                  <br>
                  <br>
                  <?php 
                      echo $vFlagSaleEditStatusErrMsg;
                  ?> 
                  <br><br>
                  Your <br>Property-for-Sale<br>Advertisement was<br>
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
