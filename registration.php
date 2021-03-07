<?php
session_start();

if ( !isset($_POST['RegistrationFormSubmit']) )
{
  header("Location: register.php");
  exit;
}

function rpHash($value) { 
    $hash = 5381; 
    $value = strtoupper($value); 
    for($i = 0; $i < strlen($value); $i++) { 
        $hash = (leftShift32($hash, 5) + $hash) + ord(substr($value, $i)); 
    } 
    return $hash; 
} 
 
// Perform a 32bit left shift 
function leftShift32($number, $steps) 
{ 
    // convert to binary (string) 
    $binary = decbin($number); 
    // left-pad with 0's if necessary 
    $binary = str_pad($binary, 32, "0", STR_PAD_LEFT); 
    // left shift manually 
    $binary = $binary.str_repeat("0", $steps); 
    // get the last 32 bits 
    $binary = substr($binary, strlen($binary) - 32); 
    // if it's a positive number return it 
    // otherwise return the 2's complement 
    return ($binary[0] == "0" ? bindec($binary) : 
        -(pow(2, 31) - bindec(substr($binary, 1)))); 
} 

if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) 
{ 

  $vRegFlag = 1;

  require ('registration-process.php');
  
  if ($vRegFlag == 2)
  {  
  
    if (isset($_SESSION['SESSION_RegEmailid'])) { unset($_SESSION['SESSION_RegEmailid']); } 
    if (isset($_SESSION['SESSION_RegPassWord'])) { unset($_SESSION['SESSION_RegPassWord']); } 
    if (isset($_SESSION['SESSION_RegFirstName'])) { unset($_SESSION['SESSION_RegFirstName']); } 
    if (isset($_SESSION['SESSION_RegLastName'])) { unset($_SESSION['SESSION_RegLastName']); } 
    if (isset($_SESSION['SESSION_RegMobile'])) { unset($_SESSION['SESSION_RegMobile']); } 
    
    header("Location: registration-success.php");
    exit;
  } 

}
else 
{

//  $_SESSION[''] = 

  require_once ('dbcon.php');

  $_SESSION['SESSION_RegEmailid'] = trim(strtolower($_POST['Emailid']));
  $_SESSION['SESSION_RegEmailid'] = mysqli_real_escape_string($dbc, $_SESSION['SESSION_RegEmailid']);
  
  $_SESSION['SESSION_RegPassWord'] = trim($_POST['PassWord']);
  $_SESSION['SESSION_RegPassWord'] = mysqli_real_escape_string($dbc, $_SESSION['SESSION_RegPassWord']);

  $_SESSION['SESSION_RegFirstName'] = trim($_POST['FirstName']);
  $_SESSION['SESSION_RegFirstName'] = mysqli_real_escape_string($dbc, $_SESSION['SESSION_RegFirstName']);

  $_SESSION['SESSION_RegLastName'] = trim($_POST['LastName']);
  $_SESSION['SESSION_RegLastName'] = mysqli_real_escape_string($dbc, $_SESSION['SESSION_RegLastName']);

  $_SESSION['SESSION_RegMobile'] = trim($_POST['Mobile']);
  $_SESSION['SESSION_RegMobile'] = mysqli_real_escape_string($dbc, $_SESSION['SESSION_RegMobile']); 

  mysqli_close($dbc);

}

?>

<!DOCTYPE html>
<html>

<head>

  <?php 
    include ('head-tag.php');
  ?>

<title>Registration <?php include ('title-tag.php'); ?></title>

</head>

<body>

  <?php 
    include ('navbar.php');
  ?>

  <div class="section-colored center-block text-center">

    <div class="container">

      <div class="row">
      
        <div class="col-md-6 col-md-offset-3 " >
        
            <h2 class="text-center">New User Registration</h2>
            
            <hr>

              <?php
                if (rpHash($_POST['defaultReal']) == $_POST['defaultRealHash']) 
                {

                  if ($vRegFlag == 2) 
                  {
              ?>
                            
                    <br>
                    <h3>
                      <p class="greenmybox">
                        <br>
                        <br> <b>Registration</b> <br>
                        <br>
                        <br> Completed <br>
                        <br>
                        <br> <b>Successfully.</b> <br>
                        <br>
                        <br>
                      </p>
                    </h3>
                    
                    <br>
                    <hr>
                    
                    <div class="btnbgc">
                      <a class="btn btn-success btn-lg btn-block" href="login.php" 
                            style="text-decoration:none;">Click here to Login</a>
                    </div>
                  <?php
                  }
                  ?>

                <?php
                  if ($vRegFlag == 0) 
                  {
                 ?>
                   
                    <h3>
                      <p class="bluemybox">
                        <br> Some One has <br>
                        <br> already chosen that  <br>
                        <br> Email-ID (Username). <br>
                        <br>
                        <br> Please try another <br>
                        <br> Email-ID (Username). <br>
                        <br>
                      </p>
                    </h3>

                    <hr>
                    
                    <div class="btnbgc">
                      <button class="btn btn-primary btn-lg btn-block" 
                                    onclick="window.history.back();">
                                    Click to go back to <br> Registration Form Page
                      </button>
                    </div>
                 <?php
                  }
                  ?>

              <?php
                } 
                else 
                {
              ?>

                  <h3>
                    <p class="redmybox">
                      <br>
                      <br> You have NOT entered <br>
                      <br> the CAPTCHA text value <br>
                      <br> correctly and hence the <br>
                      <br> Form has been Rejected. <br>
                      <br>
                      <br>
                    </p>
                  </h3>
                  
                  <hr>
                  
                  <div class="btnbgc">
                    <button class="btn btn-danger btn-lg btn-block" 
                                  onclick="window.history.back();">
                                  Click to go back to <br> Registration Form Page
                    </button> 
                  </div>
                
              <?php
                }
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
