<?php
session_start();

// echo $_POST["SearchSalePlace"];

if ( ( isset( $_POST["SearchSaleSubmit"] ) ) && ( $_POST["SearchSaleHidden"] == "TRUE" ) )
{

    $_SESSION['adv'] = 'Sale';

    $_SESSION['SalePlace'] = $_POST['SearchSalePlace'];

    if (!empty($_POST['SearchSaleUserType'])) {
    $_SESSION['SaleUserType'] = $_POST['SearchSaleUserType']; }

    $_SESSION['SalePropertyType'] = $_POST['SearchSalePropertyType'];

    if ($_SESSION['SalePropertyType'] == 2)
      $_SESSION['SaleBedroomT1'] = $_POST['SearchSaleBedroomT1'];

    if ($_SESSION['SalePropertyType'] == 3)
      $_SESSION['SaleBedroomT2'] = $_POST['SearchSaleBedroomT2'];

/*
      echo '<br>';

      echo '$_POST["SaleSearchPriceMin"] :' . $_POST['SaleSearchPriceMin'];
      echo '<br>';
      echo '$_POST["SaleSearchPriceMax"] :' . $_POST['SaleSearchPriceMax'];
      echo '<br>';
*/

    require_once ('dbcon.php');

    $_SESSION['SaleSearchPriceMin'] = trim($_POST['SaleSearchPriceMin']);
    $_SESSION['SaleSearchPriceMin'] = mysqli_real_escape_string($dbc, $_SESSION['SaleSearchPriceMin']);

    $_SESSION['SaleSearchPriceMin'] = str_replace(',', '', $_SESSION['SaleSearchPriceMin']);

    $_SESSION['SaleSearchPriceMax'] = trim($_POST['SaleSearchPriceMax']);
    $_SESSION['SaleSearchPriceMax'] = mysqli_real_escape_string($dbc, $_SESSION['SaleSearchPriceMax']);

    $_SESSION['SaleSearchPriceMax'] = str_replace(',', '', $_SESSION['SaleSearchPriceMax']);

/*
      echo '$_SESSION["SaleSearchPriceMin"] :' . $_SESSION['SaleSearchPriceMin'];
      echo '<br>';
      echo '$_SESSION["SaleSearchPriceMax"] :' . $_SESSION['SaleSearchPriceMax'];
      echo '<br>';
*/

}

if (!empty($_POST)) {
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}
/*
*/

if (!isset( $_SESSION['adv'])) {
  header('Location: search-property.php');
  exit;
}


  require_once ('dbcon.php');

  if ( isset( $_SESSION['adv'] ) )
  {

    if ($_SESSION['adv'] == 'Sale')
    {
      $vSalePlace = $_SESSION['SalePlace'];

      $vSalePropertyType = $_SESSION['SalePropertyType'];

      $vSaleSearchPriceMin = $_SESSION['SaleSearchPriceMin'] ;

      $vSaleSearchPriceMax = $_SESSION['SaleSearchPriceMax'] ;

/*
      $vSaleSearchPriceMin = str_replace(',', '', $vSaleSearchPriceMin);
      echo '$vSaleSearchPriceMin :' . $vSaleSearchPriceMin;
      echo '<br>';
*/

/*
      $vSaleSearchPriceMax = str_replace(',', '', $vSaleSearchPriceMax);
      echo '$vSaleSearchPriceMax :' . $vSaleSearchPriceMax;
      echo '<br>';
*/

      if (isset($_SESSION['SaleUserType']))
      {
        $vSaleUserTypeSwitch = implode("",$_SESSION['SaleUserType']);

          switch ($vSaleUserTypeSwitch)
          {

            case 'O':
              $vSaleUserTypeO = $_SESSION['SaleUserType'][0];
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {

                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }

              }  // end if

              else
              {

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeO' ";
                }

              } // end else
            break;  // case O

            /* ******************************************************* */

            case 'B':
              $vSaleUserTypeB = $_SESSION['SaleUserType'][1];
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }

              }  // end if

              else
              {

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeB'
                                                    ";
                }

              } // end else

            break; // case B

            /* ******************************************************* */

            case 'A':
              $vSaleUserTypeA = $_SESSION['SaleUserType'][2];
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }

              }  // end if

              else
              {

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `ut` = '$vSaleUserTypeA' ";
                }

              } // end else

            break;  // case A

            /* ******************************************************* */

            case 'OB':
              $vSaleUserTypeO = $_SESSION['SaleUserType'][0];
              $vSaleUserTypeB = $_SESSION['SaleUserType'][1];
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }

              } // end if

              else
              {

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                    ";
                }

              } // end else

            break;  // case OB

            /* ******************************************************* */

            case 'OA':
              $vSaleUserTypeO = $_SESSION['SaleUserType'][0];
              $vSaleUserTypeA = $_SESSION['SaleUserType'][2];
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {

                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }
              } // end if

              else
              {
                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                    ";
                }
              } // end else

            break; // case OA

            /* ******************************************************* */

            case 'BA':
              $vSaleUserTypeB = $_SESSION['SaleUserType'][1];
              $vSaleUserTypeA = $_SESSION['SaleUserType'][2];

              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `nb` = '$vSaleBedroom'
                                                    ";
                }
              } // end if

              else
              {
                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' ) ";
                }

              } // end else

            break; // case BA

            /* ******************************************************* */

            default:
              if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `nb` = '$vSaleBedroom'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `nb` = '$vSaleBedroom'  ";
                }
              } // end if

              else
              {
                if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMin != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ";
                }
                else
                if ( $vSaleSearchPriceMax != '' )
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType' ";
                }
              } // end else
            break; // case default

          }  // end case
      }  // end if (isset($_SESSION['SaleUserType']))

      else
      {
        if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
        {
          if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
          if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

          if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `nb` = '$vSaleBedroom'
                                              AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                              ";
          }
          else
          if ( $vSaleSearchPriceMin != '' )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `nb` = '$vSaleBedroom'
                                              AND `smm` >= '$vSaleSearchPriceMin'
                                              ";
          }
          else
          if ( $vSaleSearchPriceMax != '' )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `nb` = '$vSaleBedroom'
                                              AND `smm` <= '$vSaleSearchPriceMax'
                                              ";
          }
          else
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `nb` = '$vSaleBedroom'
                                              ";
          }
        } // end if

        else
        {
          if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                              ";
          }
          else
          if ( $vSaleSearchPriceMin != '' )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `smm` >= '$vSaleSearchPriceMin'
                                              ";
          }
          else
          if ( $vSaleSearchPriceMax != '' )
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              AND `smm` <= '$vSaleSearchPriceMax'
                                              ";
          }
          else
          {
            $vQuerySearchSale = "SELECT * FROM `saleads`
                                              WHERE `place` = '$vSalePlace'
                                              AND `pt` = '$vSalePropertyType'
                                              ";
          }
        } // end else
      } // end else

        $vResultSearchSale = mysqli_query($dbc, $vQuerySearchSale);

        if ($vResultSearchSale)
          $num_rows = mysqli_num_rows($vResultSearchSale);
        else $num_rows = 0;


      $rowstotal = $num_rows;

      if ($rowstotal > 0)
      {

        require_once ('paginator.class.php');

//        $pages = new Paginator($num_rows,9,array(15,3,6,9,12,25,50,100,250,'All'));
//        $pages = new Paginator($num_rows,9,array(5,1,2,3,4,10,15,20,25,50,100,'All'));

//        $pages = new Paginator($num_rows,9,array(10,2,3,4,5,15,20,25,50,100,'All'));

        $pages = new Paginator($num_rows,9,array(10,5,25,50,100,'All'));

        $vSalePlace = $_SESSION['SalePlace'];

        $vSalePropertyType = $_SESSION['SalePropertyType'];

        if (isset($_SESSION['SaleUserType']))
        {
            $vSaleUserTypeReSwitch = implode("",$_SESSION['SaleUserType']);

            switch ($vSaleUserTypeReSwitch)
            {

              case 'O':
                $vSaleUserTypeO = $_SESSION['SaleUserType'][0];

                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                      $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                            WHERE `place` = '$vSalePlace'
                                                            AND `pt` = '$vSalePropertyType'
                                                            AND `ut` = '$vSaleUserTypeO'
                                                            AND `nb` = '$vSaleBedroom'
                                                            ORDER BY `sapid`
                                                            DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end if

                else
                {
                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeO'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              case 'B':
                $vSaleUserTypeB = $_SESSION['SaleUserType'][1];
                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";

                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeB'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              case 'A':
                $vSaleUserTypeA = $_SESSION['SaleUserType'][2];
                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `ut` = '$vSaleUserTypeA'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              case 'OB':
                $vSaleUserTypeO = $_SESSION['SaleUserType'][0];
                $vSaleUserTypeB = $_SESSION['SaleUserType'][1];

                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {

                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeB' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              case 'OA':
                $vSaleUserTypeO = $_SESSION['SaleUserType'][0];
                $vSaleUserTypeA = $_SESSION['SaleUserType'][2];

                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end  ";
                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeO'  OR `ut` = '$vSaleUserTypeA' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              case 'BA':
                $vSaleUserTypeB = $_SESSION['SaleUserType'][1];
                $vSaleUserTypeA = $_SESSION['SaleUserType'][2];

                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {

                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB' OR `ut` = '$vSaleUserTypeA' )
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end  ";
                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB'  OR `ut` = '$vSaleUserTypeA' )
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `ut` = '$vSaleUserTypeB'  OR `ut` = '$vSaleUserTypeA' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

              default:
                if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
                  if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `nb` = '$vSaleBedroom'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `nb` = '$vSaleBedroom'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end if

                else
                {

                  if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMin != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `smm` >= '$vSaleSearchPriceMin'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vSaleSearchPriceMax != '' )
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          AND `smm` <= '$vSaleSearchPriceMax'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                          WHERE `place` = '$vSalePlace'
                                                          AND `pt` = '$vSalePropertyType'
                                                          ORDER BY `sapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                } // end else
              break;

            } // end switch

        } // end if (isset($_SESSION['SaleUserType']))

        else
        {

          if ( ( isset($_SESSION['SaleBedroomT1']) && $_SESSION['SaleBedroomT1'] > 0 ) || ( isset($_SESSION['SaleBedroomT2']) && $_SESSION['SaleBedroomT2'] > 0 ) )
          {
            if ( isset($_SESSION['SaleBedroomT1']) ) $vSaleBedroom = $_SESSION['SaleBedroomT1'];
            if ( isset($_SESSION['SaleBedroomT2']) )  $vSaleBedroom = $_SESSION['SaleBedroomT2'];

              if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
              {
                $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                      WHERE `place` = '$vSalePlace'
                                                      AND `pt` = '$vSalePropertyType'
                                                      AND `nb` = '$vSaleBedroom'
                                                      AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                      ORDER BY `sapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vSaleSearchPriceMin != '' )
              {
                $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                      WHERE `place` = '$vSalePlace'
                                                      AND `pt` = '$vSalePropertyType'
                                                      AND `nb` = '$vSaleBedroom'
                                                      AND `smm` >= '$vSaleSearchPriceMin'
                                                      ORDER BY `sapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vSaleSearchPriceMax != '' )
              {
                $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                      WHERE `place` = '$vSalePlace'
                                                      AND `pt` = '$vSalePropertyType'
                                                      AND `nb` = '$vSaleBedroom'
                                                      AND `smm` <= '$vSaleSearchPriceMax'
                                                      ORDER BY `sapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              {
                $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                      WHERE `place` = '$vSalePlace'
                                                      AND `pt` = '$vSalePropertyType'
                                                      AND `nb` = '$vSaleBedroom'
                                                      ORDER BY `sapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
          } // end if

          else
          {

            if ( ( $vSaleSearchPriceMin != '' )  &&  ( $vSaleSearchPriceMax != '' ) )
            {
              $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND ( `smm` BETWEEN '$vSaleSearchPriceMin' AND '$vSaleSearchPriceMax' )
                                                    ORDER BY `sapid`
                                                    DESC LIMIT $pages->limit_start, $pages->limit_end ";
            }
            else
            if ( $vSaleSearchPriceMin != '' )
            {
              $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `smm` >= '$vSaleSearchPriceMin'
                                                    ORDER BY `sapid`
                                                    DESC LIMIT $pages->limit_start, $pages->limit_end ";
            }
            else
            if ( $vSaleSearchPriceMax != '' )
            {
              $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    AND `smm` <= '$vSaleSearchPriceMax'
                                                    ORDER BY `sapid`
                                                    DESC LIMIT $pages->limit_start, $pages->limit_end ";
            }
            else
            {
              $vQueryReSearchSale = "SELECT * FROM `saleads`
                                                    WHERE `place` = '$vSalePlace'
                                                    AND `pt` = '$vSalePropertyType'
                                                    ORDER BY `sapid`
                                                    DESC LIMIT $pages->limit_start, $pages->limit_end ";
            }
          } // end else

        } // end else

        $vResultReSearchSale = mysqli_query($dbc, $vQueryReSearchSale);
        $num_rows = mysqli_num_rows($vResultReSearchSale);

//     $pages = new Paginator($num_rows,9,array(5,1,2,3,4,10,15,20,25,50,100,'All'));

      } // end if ($rowstotal > 0)

      else
      {
//        $vnorstfndmsg = 'Your Search did Not Match any Ad.';
      }

    } // end if ($_SESSION['adv'] == 'Sale')

  } // end if ( isset( $_SESSION['adv'] ) )

  mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

  <title>Search Results - Property-for-Sale <?php include ('title-tag.php'); ?></title>

<script type="text/javascript">
function SearchSaleModalSpin()
{
      $('#LoadingSpinModal').modal('show');
      SpinStart();
}
</script>

</head>

<body>

  <?php
    if  (isset($_SESSION['SESSION_NKPUID'])) {
      include ('navbar-in.php'); }
    else {
      include ('navbar.php'); }
  ?>

  <div class="section-colored text-center  center-block ">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 " >

          <h2 class="text-center" >Search Results</h2>


          <hr>

          <?php
            if ( isset( $_SESSION['adv'] ) )
            {

              if ($_SESSION['adv'] == 'Sale')
              {


                if ($rowstotal > 0) {


            echo "<b><span style='font-size:20px'>Property-for-Sale Ads.</span></b><hr>";

            echo 'Total No. of Records / items found : <b>'.$rowstotal.'</b><br>';

              // echo "<span class=\"paginate\">Page: $pages->current_page of $pages->num_pages</span><br>";
            echo "<span class=\"\">Page: $pages->current_page of $pages->num_pages</span><br>";

            echo "<span class=\"\">".$pages->display_jump_menu()."&nbsp;".$pages->display_items_per_page()."</span><br><br>";

            echo $pages->display_pages();

          ?>

          <?php
            $vSalePropertyTypeD = $_SESSION['SalePropertyType'];
              switch ($vSalePropertyTypeD)
              {
                  case '1':
                      $vSalePTDisplay = 'Vacant Land / Plot / Site';
                      break;
                  case '2':
                      $vSalePTDisplay = 'Multi-Storey Apartment / Flat';
                      break;
                  case '3':
                      $vSalePTDisplay = 'Independent Bungalow / House / Villa';
                      break;
                  case '4':
                      $vSalePTDisplay = 'Commercial Building / Office Space';
                      break;
              }
          ?>

          <div class=" " style="font-size:16px">
            <hr>
            Location / Place of Property :
            <b><?php echo ucwords($_SESSION['SalePlace']); ?></b>
            <br>
            <hr>
            Type of Property :
            <b><?php echo $vSalePTDisplay; ?></b>
            <br>

            <?php
              if (isset($_SESSION['SaleBedroomT1']))
                if ($_SESSION['SaleBedroomT1'] > 0)
                {
                  echo '<hr>';
                  echo 'No. of Bedrooms : <b>';
                  echo $_SESSION['SaleBedroomT1'];
                  echo '</b>';
                }
              if (isset($_SESSION['SaleBedroomT2']))
                if ($_SESSION['SaleBedroomT2'] > 0)
                {
                echo '<hr>';
                echo 'No. of Bedrooms : <b>';
                echo $_SESSION['SaleBedroomT2'];
                echo '</b>';
                }
            ?>
          </div>

          <?php
            while($row = mysqli_fetch_assoc($vResultReSearchSale))
            {
          ?>
              <hr>
              <div class="btn. btn-default btn-lg btn-block. " style="border: 1px solid #999">
              <a href="property-for-sale-ad.php?pid=<?php echo $row['sapid']; ?>" class=""
                    title="Property Description :- <?php echo ucfirst($row['description']); ?>"
                    onclick="SearchSaleModalSpin();" >

                <div class=" ">

                  <?php
                    switch ($row['ut'])
                    {
                        case 'O':
                            $vSaleUTDisplay = 'Owner';
                            break;
                        case 'B':
                            $vSaleUTDisplay = 'Builder';
                            break;
                        case 'A':
                            $vSaleUTDisplay = 'Agent / Broker';
                            break;
                    }



                    if ($row['title'] != '') {
                      echo '<span style="font-size:24px"> Title : <b>' . ucwords($row['title']) . '</b> </span> <br>'; }
                    else {
                      echo '<span style="font-size:24px"> Title : <b> N.A.</b> </span> <br>'; }

                    echo 'Property ID : <b>' . $row['sapid'] . '</b><br>';

                    //  echo 'Ad. Posted Date : <b>'. substr($row['sadate'], 0, 10) . '</b> <br>';

                    echo 'Ad. Post Date : <b>'. date("d M Y", strtotime(substr($row['sapid'], 0, 8))) . '</b><br>';

                    echo 'Posted By : <b>' . $vSaleUTDisplay . '</b><br>';

                    if ($row['xc'] != '') {
                      echo 'Ad. Photos/Pictures : <b>' . $row['xc'] . '</b><br>'; }

                    if ($row['price'] != '') {
                      echo 'Total Price : $. <b>' . $row['price'] . '</b><br>'; }
                    else {
                      echo 'Total Price : <b>- Not Given -</b><br>'; }


                  ?>

                  <div style="font-size:12px; margin:10px 0px 0px 0px">
                    ( Click to view full Ad. Details ... )
                  </div>

                </div>

              </a>
            </div>
          <?php
            }
          ?>


          <?php

            echo "<hr>";

            echo $pages->display_pages().'<br><br>';

            echo "<span class=\"\">".$pages->display_jump_menu()."&nbsp;".$pages->display_items_per_page()."</span><br>";

          //  echo "<span class=\"paginate\">Page: $pages->current_page of $pages->num_pages</span><br>";
            echo "<span class=\"\">Page: $pages->current_page of $pages->num_pages</span><br>";

            echo 'Total No. of Records / items found : <b>'.$rowstotal.'</b><br>';

          //	echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
          ?>

          <hr>

          <br>

          <div id="" class="btnbgc">
            <a class="btn btn-info btn-lg btn-block"
                  href="search-property-for-sale.php"
                  style="color:black">
                          Back to Search-Properties
            </a>
          </div>

          <br>

          <?php
          }
          else
          {
          ?>

        <br>

        <div class="redmybox" >
          <br>
            <h3 style="padding.:0px 0px 0px 0px">
              Your <br><br>Property-for-Sale <br><br>Search Criteria <br><br>did <b>Not</b> Match <br><br>any Property Ad.
            </h3>
            <br><br>
        </div>

        <br>
        <hr>
        <br>

        <div class="btnbgc">
          <button class="btn btn-warning btn-lg btn-block" onclick="window.history.back();" style="color:black">
            Try Search Again !</button>
        </div>

        <br>

        <?php
              }
            }
          }
        ?>

          <hr>


          <br>
          <br>

  <?php
    include ('modal-spin.php');
  ?>


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
