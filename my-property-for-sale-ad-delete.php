<?php 

include ('login-user-check.php');

if ( (isset($_POST['SaleDeleteSubmit'])) && ($_POST['SaleDeleteHidden'] == 'TRUE') ) 
{

  require_once ('dbcon.php');

  $vSaleDeleteAdNum = $_POST['SaleDeleteAdNum'];

  $vSaleDeletePixCount = $_POST['SaleDeletePixCount'];
  $vSaleDeletePixFileNames = $_POST['SaleDeletePixFileNames'];

  if ($vSaleDeletePixCount != '0') 
  {
    $vExplodeSaleDeletePixFileNames = explode(" ",$vSaleDeletePixFileNames);  
    foreach ($vExplodeSaleDeletePixFileNames as $vExplodeSaleDeletePixFileNamesValue)
    {
      $vDeleteFromFolderSalePix = "sap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleDeletePixFileNamesValue ; 
      unlink($vDeleteFromFolderSalePix);
    }
  }
  
  $vQueryDeleteSaleAd = "DELETE FROM `saleads` WHERE `sanum` = '$vSaleDeleteAdNum' "; 

  mysqli_query($dbc, $vQueryDeleteSaleAd);

  mysqli_close($dbc);

}

header("Location: my-property-ad-list.php");
exit();

?> 
