<?php

  if (isset($_POST['LoginSubmit']))
  {
    session_start();

    require_once ('dbcon.php');

    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
      $str = @trim($str);
      //  if(get_magic_quotes_gpc()) {
      //    $str = stripslashes($str);
      //  }
      $str = stripslashes($str);
    $fndbc = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
    return mysqli_real_escape_string($fndbc, $str);
    }

    $vLoginUserName = clean(strtolower($_POST['LoginUserName']));
    $vLoginPassWord = clean($_POST['LoginPassWord']);

    //#printf('<br>User: %s', htmlspecialchars($vLoginUserName, ENT_QUOTES));
    //#printf('<br>Pass: %s', htmlspecialchars($vLoginPassWord, ENT_QUOTES));

    /*
    $vQueryLogin = "SELECT * FROM `nkpusers`
                              WHERE `emailid` = '$vLoginUserName'
                              AND `password` = '$vLoginPassWord' ";
    $vResultLogin = mysqli_query($dbc, $vQueryLogin);
    */

    $vQueryLogin = "SELECT password FROM `nkpusers`
                              WHERE emailid = '$vLoginUserName' ";

    // # printf('<br>Query: %s', htmlspecialchars($vQueryLogin, ENT_QUOTES));

    $vHashPassWord = mysqli_query($dbc, $vQueryLogin);
    $vFetchUser = mysqli_fetch_assoc($vHashPassWord);

    // # printf('<br>Hash: %s', htmlspecialchars($vHashPassWord, ENT_QUOTES));

    $vResult = password_verify($vLoginPassWord, $vFetchUser['password']);

    // # printf('<br>Result: %s', htmlspecialchars($vResult, ENT_QUOTES));

    if ($vResult) {

    $vQueryLogin = "SELECT * FROM `nkpusers`
                              WHERE emailid = '$vLoginUserName' ";
    $vResultLogin = mysqli_query($dbc, $vQueryLogin);


    if($vResultLogin)
    {

      if(mysqli_num_rows($vResultLogin) == 1)
      {
        // Login Successful

        session_regenerate_id();

        $vFetchUser = mysqli_fetch_assoc($vResultLogin);

        $_SESSION['SESSION_NKPUID'] = trim($vFetchUser['nkpuid']);
        $_SESSION['SESSION_EMAILID'] = trim($vFetchUser['emailid']);
        $_SESSION['SESSION_FIRSTNAME'] = trim($vFetchUser['firstname']);
        $_SESSION['SESSION_LASTNAME'] = trim($vFetchUser['lastname']);

        $svNkpUid = $_SESSION['SESSION_NKPUID'];

        date_default_timezone_set('America/Los_Angeles');

        $vUpdateLoginDate = date("Y-m-d H:i:s");

        $vQueryUpdateLoginDate = "UPDATE `nkpusers`
                                                    SET `logindate` = '$vUpdateLoginDate'
                                                    WHERE `nkpuid` = '$svNkpUid' ";

        mysqli_query($dbc, $vQueryUpdateLoginDate);

        $vQueryUpdateLoginCount = "UPDATE `nkpusers`
                                                      SET `ic` = `ic` + 1
                                                      WHERE `nkpuid` = '$svNkpUid' ";

        mysqli_query($dbc, $vQueryUpdateLoginCount);

        session_write_close();

        mysqli_close($dbc);

        header("Location: dashboard.php");
        exit();

      }
      else
      {
        // Login failed
        $vLoginErrorMsg = "<b>Username or Password is NOT Correct or Valid !</b>";
      }

    }
    else
    {
      trigger_error("Query failed");
    }

  } else {
    $vLoginErrorMsg = "<b>Username or Password is NOT Correct or Valid !</b>";
  }

    mysqli_close($dbc);

  }

?>
