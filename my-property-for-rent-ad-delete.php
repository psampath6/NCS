<?php 

include ('login-user-check.php');

if ( (isset($_POST['RentDeleteSubmit'])) && ($_POST['RentDeleteHidden'] == 'TRUE') ) 
{

  require_once ('dbcon.php');

  $vRentDeleteAdNum = $_POST['RentDeleteAdNum'];

  $vRentDeletePixCount = $_POST['RentDeletePixCount'];
  $vRentDeletePixFileNames = $_POST['RentDeletePixFileNames'];

  if ($vRentDeletePixCount != '0') 
  {
    $vExplodeRentDeletePixFileNames = explode(" ",$vRentDeletePixFileNames);  
    foreach ($vExplodeRentDeletePixFileNames as $vExplodeRentDeletePixFileNamesValue)
    {
      $vDeleteFromFolderRentPix = "rap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentDeletePixFileNamesValue ; 
      unlink($vDeleteFromFolderRentPix);
    }
  }
  
  $vQueryDeleteRentAd = "DELETE FROM `rentads` WHERE `ranum` = '$vRentDeleteAdNum' "; 

  mysqli_query($dbc, $vQueryDeleteRentAd);

  mysqli_close($dbc);

}

header("Location: my-property-ad-list.php");
exit();

?> 
