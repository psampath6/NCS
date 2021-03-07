<?php

$vRegFlag = 1;
if (isset($_POST['RegistrationFormSubmit'])) {
     if (isset($_POST['PassWord'])) {
         $vPassWord = trim($_POST['PassWord']);
     };
#printf('<br>Password: %s', htmlspecialchars($vPassWord, ENT_QUOTES));
};

if (isset($_POST['RegistrationFormSubmit']))
{

/*
  $error = array(); //Declare An Array to store any error message

  if (empty($error)) //send to Database if there's no error '
  {
    // If everything's OK...
*/

  require_once ('dbcon.php');

    $vEmailid = trim(strtolower($_POST['Emailid']));
    $vEmailid = mysqli_real_escape_string($dbc, $vEmailid);

    $vQueryVerifyEmail = "SELECT * FROM `nkpusers` WHERE emailid ='$vEmailid' ";
    $vResultVerifyEmail = mysqli_query($dbc, $vQueryVerifyEmail);

    if (mysqli_num_rows($vResultVerifyEmail) == 1)
    {

          $vRegFlag = 0;

    }

    if (mysqli_num_rows($vResultVerifyEmail) == 0)
    {
      if (isset($_POST['PassWord'])) {
          $vPassWord = trim($_POST['PassWord']);
      };
      #printf('<br>Password: %s', htmlspecialchars($vPassWord, ENT_QUOTES));

      $vRegFlag = 2;

      $vFirstName = trim($_POST['FirstName']);
      $vFirstName = mysqli_real_escape_string($dbc, $vFirstName);

      $vLastName = trim($_POST['LastName']);
      $vLastName = mysqli_real_escape_string($dbc, $vLastName);

      $vMobile = trim($_POST['Mobile']);
      $vMobile = mysqli_real_escape_string($dbc, $vMobile);
      if ($vMobile != '') $vMobile = '1-' . $vMobile ;

      $vPassWord = trim($_POST['PassWord']);
      #printf('<br>Password: %s', htmlspecialchars($vPassWord, ENT_QUOTES));



      $hashPassWord = password_hash($vPassWord, PASSWORD_DEFAULT);
      $hashPassWord = mysqli_real_escape_string($dbc, $hashPassWord);
      #printf('<br>Password: %s', htmlspecialchars($hashPassWord, ENT_QUOTES));

      #$vPassWord = mysqli_real_escape_string($dbc, $vPassWord);
      date_default_timezone_set('America/Los_Angeles');

      $vRegNkpUid = date('Ymd-His') . '-' . substr(microtime(), 2,4) ;

/*
      $vRegDate = date("Y-m-d H:i:s");
        `regdate`
        '$vRegDate'
*/

      $vQueryInsertUser = "INSERT INTO `nkpusers`
        (
        `nkpuid`,
        `firstname`,
        `lastname`,
        `cellnum`,
        `emailid`,
        `password`
        )
        VALUES
        (
        '$vRegNkpUid',
        '$vFirstName',
        '$vLastName',
        '$vMobile',
        '$vEmailid',
        '$hashPassWord'
        )";

      $vResultInsertUser = mysqli_query($dbc, $vQueryInsertUser);
      #printf('<br>Password: %s', htmlspecialchars($hashPassWord, ENT_QUOTES));

      if (!$vResultInsertUser)
      { // If Query Failed
        trigger_error('Query Failed...') ;
      }

      if (mysqli_affected_rows($dbc) == 1)
      {

        //If the Insert Query was successfull.

        //echo '<div class="success">Registration Successful';

        /*
        echo '<div class="success">Thank you for registering!
        A confirmation email has been sent to '.$vemailid.'
        Please click on the Activation Link to Activate your account </div>';
        */

        /*
        // Send the email:
        $message = " To activate your account, please click on this link:\n\n";
        $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
        mail($Email, 'Registration Confirmation', $message, 'From: ismaakeel@gmail.com');
        */

      }

    }

  /*
  }
  */

  mysqli_close($dbc);

}
?>
