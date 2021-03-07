<?php

//  session_start();

include ('login-user-check.php');


if (!isset($_POST['RentPostSubmit']))
{
    header("Location: post-property-for-rent-ad.php");
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
  
    $vFlagRentPostStatus = 1;

    require ('post-property-for-rent-ad-submit.php');
    
    if ($vFlagRentPostStatus == 2)
    {  
        header("Location: post-property-for-rent-ad-success.php");
        exit;
    } 
  }
else 
{
  include ('login-user-check.php');
}

*/

// ---------------------------------------------------------------------------------


if (isset($_POST['RentPostSubmit']))
{

    $vFlagRentPostStatus = 1;

    require ('post-property-for-rent-ad-submit.php');
    
      if ($vFlagRentPostStatus == 2)
      {  
          header("Location: post-property-for-rent-ad-success.php");
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

<title>Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar-in.php');
  ?>

    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row ">
            
                <div class="col-md-6 col-md-offset-3 " >
                
                    <h2 class="text-center" >Post Property-for-Rent Ad.</h2>
                    
                    
                    <hr>
                    <hr>
                    
                    <?php 

//                      if (rpHash($_POST['defaultRealT']) == $_POST['defaultRealTHash']) 

                      if (isset($_POST['RentPostSubmit']))
                      {

                        ?>   
                        
                        <h3>
                        <p class="redmybox">
                            <br>
                            <?php 
                              if ($vFlagRentPostStatus == 0) 
                              {
                                echo $vFlagRentPostErrorMsg;
                                echo '<br><br>';
                              }
                            ?> 
                            Your <br>Property-for-Rent<br>Advertisement was<br><b>NOT</b> submitted.<br><br>Please try again..!
                            <br>
                            <br>
                        </p>
                        </h3>
                        
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
                          
                          <br>
                          <hr>
                          <br>
                          
                          <div id="" class="btnbgc">
                            <button class="btn btn-danger btn-lg btn-block" onclick="window.history.back();">Click to go Back.</button> 
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
