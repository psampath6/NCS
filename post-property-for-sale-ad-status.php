<?php

//  session_start();

include ('login-user-check.php');


if (!isset($_POST['SalePostSubmit']))
{
    header("Location: post-property-for-sale-ad.php");
    exit;
}

// ----------------------------------------------------------------------------

/*

function rpHash($value) {
	$hash = 5381;
	$value = strtoupper($value);
	for($i = 0; $i < strlen($value); $i++) {
		$hash = (($hash << 5) + $hash) + ord(substr($value, $i));
	}
	return $hash;
}


  if (rpHash($_POST['defaultRealT']) == $_POST['defaultRealTHash']) 
  {

    $vFlagSalePostStatus = 1;

    require ('post-property-for-sale-ad-submit.php');
    
      if ($vFlagSalePostStatus == 2)
      {  
          header("Location: post-property-for-sale-ad-success.php");
          exit;
      } 
      
  }
  else 
  {
    include ('login-user-check.php');
  }

*/

// ---------------------------------------------------------------------------------

if (isset($_POST['SalePostSubmit']))
{

    $vFlagSalePostStatus = 1;

    require ('post-property-for-sale-ad-submit.php');
    
      if ($vFlagSalePostStatus == 2)
      {  
          header("Location: post-property-for-sale-ad-success.php");
          exit;
      } 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php 
    include ('head-tag.php');
?>

<title>Post Property-for-Sale Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row ">
            
                <div class="col-md-6 col-md-offset-3 " >
                
                    <h2 class="text-center" >Post Property-for-Sale Ad.</h2>
                    
                    
                    <hr>
                    <hr>
                    
                    <?php 

//                      if (rpHash($_POST['defaultRealT']) == $_POST['defaultRealTHash']) 
                      
                      if (isset($_POST['SalePostSubmit']))

                      {

                        ?>   
                              <h3>
                              <p class="redmybox">
                                  <br>
                                  <?php 
                                    if ($vFlagSalePostStatus == 0) 
                                    {
                                      echo $vFlagSalePostErrorMsg;
                                      echo '<br><br>';
                                    }
                                  ?> 
                                  Your <br>Property-for-Sale<br>Advertisement was<br><b>NOT</b> submitted.<br><br>Please try again..!
                                  <br>
                                  <br>
                              </p>
                              </h4>
                              
                              <hr>
                              <hr>
                              
                              <div class="btnbgc">
                                <button class="btn btn-danger btn-lg btn-block" onclick="window.history.back();">Click to go Back</button> 
                              </div>
                              
                        <?php 
                             
                       }
                       
                       /*
                       else 
                        {
                        */
                      ?>                    

<!-- 
                          <h3>
                          <p class="redmybox">
                          <br>You have NOT entered<br><br>the CAPTCHA text value<br><br>correctly and hence the<br><br>Form has been Rejected.<br><br>
                          </p>
                          </h3>
                          
                          <hr>
                          <hr>
                          <hr>
                          
                          <div class="btnbgc">
                          <button class="btn btn-danger btn-lg btn-block" onclick="window.history.back();">Click to go Back</button> 
                          </div>
-->
                          
                      <?php 
                        /*
                        }
                        */
                      ?>                    

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
