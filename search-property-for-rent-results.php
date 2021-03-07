<?php
session_start();

if ( ( isset( $_POST["SearchRentSubmit"] ) ) && ( $_POST["SearchRentHidden"] == "TRUE" ) )
{

    $_SESSION['adv'] = 'Rent';

    $_SESSION['RentPlace'] = $_POST['SearchRentPlace'];

    if (!empty($_POST['SearchRentUserType'])) {
    $_SESSION['RentUserType'] = $_POST['SearchRentUserType']; }

    $_SESSION['RentPropertyType'] = $_POST['SearchRentPropertyType'];

    if ($_SESSION['RentPropertyType'] == 1)
      $_SESSION['RentBedroomT1'] = $_POST['SearchRentBedroomT1'];

    if ($_SESSION['RentPropertyType'] == 2)
      $_SESSION['RentBedroomT2'] = $_POST['SearchRentBedroomT2'];


    require_once ('dbcon.php');

    $_SESSION['RentSearchPriceMin'] = trim($_POST['RentSearchPriceMin']);
    $_SESSION['RentSearchPriceMin'] = mysqli_real_escape_string($dbc, $_SESSION['RentSearchPriceMin']);

    $_SESSION['RentSearchPriceMin'] = str_replace(',', '', $_SESSION['RentSearchPriceMin']);

    $_SESSION['RentSearchPriceMax'] = trim($_POST['RentSearchPriceMax']);
    $_SESSION['RentSearchPriceMax'] = mysqli_real_escape_string($dbc, $_SESSION['RentSearchPriceMax']);

    $_SESSION['RentSearchPriceMax'] = str_replace(',', '', $_SESSION['RentSearchPriceMax']);


}

if (!empty($_POST)) {
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}


if (!isset( $_SESSION['adv'])) {
  header('Location: search-property.php');
  exit;
}


  require_once ('dbcon.php');

  if ( isset( $_SESSION['adv'] ) )
  {
    if ($_SESSION['adv'] == 'Rent')
    {

      $vRentPlace = $_SESSION['RentPlace'];

      $vRentPropertyType = $_SESSION['RentPropertyType'];

      $vRentSearchPriceMin = $_SESSION['RentSearchPriceMin'] ;

      $vRentSearchPriceMax = $_SESSION['RentSearchPriceMax'] ;


      if (isset($_SESSION['RentUserType']))
      {
        $vRentUserTypeSwitch = implode("",$_SESSION['RentUserType']);

          switch ($vRentUserTypeSwitch)
          {

            case 'O':
              $vRentUserTypeO = $_SESSION['RentUserType'][0];
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `nb` = '$vRentBedroom'
                                                    ";
                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeO'
                                                    ";
                }
              }

            break;



            case 'B':
              $vRentUserTypeB = $_SESSION['RentUserType'][1];
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `nb` = '$vRentBedroom'
                                                    ";
                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeB'
                                                    ";
                }
              }

            break;



            case 'A':
              $vRentUserTypeA = $_SESSION['RentUserType'][2];

              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `nb` = '$vRentBedroom'
                                                    ";
                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `ut` = '$vRentUserTypeA'
                                                    ";
                }
              }

            break;



            case 'OB':
              $vRentUserTypeO = $_SESSION['RentUserType'][0];
              $vRentUserTypeB = $_SESSION['RentUserType'][1];
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `nb` = '$vRentBedroom'
                                                    ";

                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                    ";

                }
              }

            break;



            case 'OA':
              $vRentUserTypeO = $_SESSION['RentUserType'][0];
              $vRentUserTypeA = $_SESSION['RentUserType'][2];
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    ";

                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                    ";

                }
              }

            break;



            case 'BA':
              $vRentUserTypeB = $_SESSION['RentUserType'][1];
              $vRentUserTypeA = $_SESSION['RentUserType'][2];
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `nb` = '$vRentBedroom'
                                                    ";

                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                    ";

                }
              }

            break;



            default:
              if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
              {
                if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `nb` = '$vRentBedroom'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `nb` = '$vRentBedroom'
                                                    ";
                }
              }

              else
              {
                if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                    ";
                }
                else
                if ( $vRentSearchPriceMin != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `smm` >= '$vRentSearchPriceMin'
                                                    ";
                }
                else
                if ( $vRentSearchPriceMax != '' )
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    AND `smm` <= '$vRentSearchPriceMax'
                                                    ";
                }
                else
                {
                  $vQuerySearchRent = "SELECT * FROM `rentads`
                                                    WHERE `place` = '$vRentPlace'
                                                    AND `pt` = '$vRentPropertyType'
                                                    ";
                }
              }

            break;


          }

      }



      else
      {
          if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
          {
            if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
            if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

            if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `nb` = '$vRentBedroom'
                                                AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                ";
            }
            else
            if ( $vRentSearchPriceMin != '' )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `nb` = '$vRentBedroom'
                                                AND `smm` >= '$vRentSearchPriceMin'
                                                ";
            }
            else
            if ( $vRentSearchPriceMax != '' )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `nb` = '$vRentBedroom'
                                                AND `smm` <= '$vRentSearchPriceMax'
                                                ";
            }
            else
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `nb` = '$vRentBedroom'
                                                ";
            }
          }

          else
          {
            if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                ";
            }
            else
            if ( $vRentSearchPriceMin != '' )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `smm` >= '$vRentSearchPriceMin'
                                                ";
            }
            else
            if ( $vRentSearchPriceMax != '' )
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                AND `smm` <= '$vRentSearchPriceMax'
                                                ";
            }
            else
            {
              $vQuerySearchRent = "SELECT * FROM `rentads`
                                                WHERE `place` = '$vRentPlace'
                                                AND `pt` = '$vRentPropertyType'
                                                ";

            }
          }
      }

        $vResultSearchRent = mysqli_query($dbc, $vQuerySearchRent);

        if ($vResultSearchRent)
          $num_rows = mysqli_num_rows($vResultSearchRent);
        else $num_rows = 0;

      //echo '$num_rows = '.$num_rows;

      $rowstotal = $num_rows;

      if ($rowstotal > 0)
      {

        require_once ('paginator.class.php');

//        $pages = new Paginator($num_rows,9,array(15,3,6,9,12,25,50,100,250,'All'));
//        $pages = new Paginator($num_rows,9,array(5,1,2,3,4,10,15,20,25,50,100,'All'));

//        $pages = new Paginator($num_rows,9,array(10,2,3,4,5,15,20,25,50,100,'All'));

        $pages = new Paginator($num_rows,9,array(10,5,25,50,100,'All'));

        $vRentPlace = $_SESSION['RentPlace'];

        $vRentPropertyType = $_SESSION['RentPropertyType'];

        if (isset($_SESSION['RentUserType']))
        {
            $vRentUserTypeReSwitch = implode("",$_SESSION['RentUserType']);

            switch ($vRentUserTypeReSwitch)
            {

              case 'O':
                $vRentUserTypeO = $_SESSION['RentUserType'][0];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeO'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }
              break;


              case 'B':
                $vRentUserTypeB = $_SESSION['RentUserType'][1];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeB'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                break;


              case 'A':
                $vRentUserTypeA = $_SESSION['RentUserType'][2];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `ut` = '$vRentUserTypeA'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

              break;


              case 'OB':
                $vRentUserTypeO = $_SESSION['RentUserType'][0];
                $vRentUserTypeB = $_SESSION['RentUserType'][1];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeB' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

              break;


              case 'OA':
                $vRentUserTypeO = $_SESSION['RentUserType'][0];
                $vRentUserTypeA = $_SESSION['RentUserType'][2];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end  ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO'  OR `ut` = '$vRentUserTypeA' )
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO'  OR `ut` = '$vRentUserTypeA' )
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO'  OR `ut` = '$vRentUserTypeA' )
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeO'  OR `ut` = '$vRentUserTypeA' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }
              break;


              case 'BA':
                $vRentUserTypeB = $_SESSION['RentUserType'][1];
                $vRentUserTypeA = $_SESSION['RentUserType'][2];
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB' OR `ut` = '$vRentUserTypeA' )
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end  ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB'  OR `ut` = '$vRentUserTypeA' )
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB'  OR `ut` = '$vRentUserTypeA' )
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB'  OR `ut` = '$vRentUserTypeA' )
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `ut` = '$vRentUserTypeB'  OR `ut` = '$vRentUserTypeA' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }
              break;


              default:
                if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
                {
                  if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
                  if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `nb` = '$vRentBedroom'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `nb` = '$vRentBedroom'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }

                else
                {

                  if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMin != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `smm` >= '$vRentSearchPriceMin'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  if ( $vRentSearchPriceMax != '' )
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          AND `smm` <= '$vRentSearchPriceMax'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                  else
                  {
                    $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                          WHERE `place` = '$vRentPlace'
                                                          AND `pt` = '$vRentPropertyType'
                                                          ORDER BY `rapid`
                                                          DESC LIMIT $pages->limit_start, $pages->limit_end ";
                  }
                }
              break;

            }
        }


        else
        {

            if ( ( isset($_SESSION['RentBedroomT1']) && $_SESSION['RentBedroomT1'] > 0 ) || ( isset($_SESSION['RentBedroomT2']) && $_SESSION['RentBedroomT2'] > 0 ) )
            {
              if ( isset($_SESSION['RentBedroomT1']) ) $vRentBedroom = $_SESSION['RentBedroomT1'];
              if ( isset($_SESSION['RentBedroomT2']) )  $vRentBedroom = $_SESSION['RentBedroomT2'];

              if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `nb` = '$vRentBedroom'
                                                      AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vRentSearchPriceMin != '' )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `nb` = '$vRentBedroom'
                                                      AND `smm` >= '$vRentSearchPriceMin'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vRentSearchPriceMax != '' )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `nb` = '$vRentBedroom'
                                                      AND `smm` <= '$vRentSearchPriceMax'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `nb` = '$vRentBedroom'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
            }

            else
            {

              if ( ( $vRentSearchPriceMin != '' )  &&  ( $vRentSearchPriceMax != '' ) )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND ( `smm` BETWEEN '$vRentSearchPriceMin' AND '$vRentSearchPriceMax' )
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vRentSearchPriceMin != '' )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `smm` >= '$vRentSearchPriceMin'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              if ( $vRentSearchPriceMax != '' )
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      AND `smm` <= '$vRentSearchPriceMax'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
              else
              {
                $vQueryReSearchRent = "SELECT * FROM `rentads`
                                                      WHERE `place` = '$vRentPlace'
                                                      AND `pt` = '$vRentPropertyType'
                                                      ORDER BY `rapid`
                                                      DESC LIMIT $pages->limit_start, $pages->limit_end ";
              }
            }
        }

        $vResultReSearchRent = mysqli_query($dbc, $vQueryReSearchRent);
        $num_rows = mysqli_num_rows($vResultReSearchRent);

        //     $pages = new Paginator($num_rows,9,array(5,1,2,3,4,10,15,20,25,50,100,'All'));

      } // end  if ($rowstotal > 0)

      else
      {
//        $vnorstfndmsg = 'Your Search did Not Match any Ad.';
      }

    } // end if ($_SESSION['adv'] == 'Rent')

  } // end if ( isset( $_SESSION['adv'] ) )

  mysqli_close($dbc);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

  <title>Search Results - Property-for-Rent <?php include ('title-tag.php'); ?></title>

<script type="text/javascript">
function SearchRentModalSpin()
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

      <div class="row ">

        <div class="col-md-6 col-md-offset-3 " >

          <h2 class="text-center" >Search Results</h2>


          <hr>

          <?php
            if ( isset( $_SESSION['adv'] ) )
            {

              if ($_SESSION['adv'] == 'Rent')
              {


                if ($rowstotal > 0)
                {


                  echo "<b><span style='font-size:20px'>Property-for-Rent Ads.</span></b><hr>";

                  echo 'Total No. of Records / items found : <b>'.$rowstotal.'</b><br>';

                //	echo "<span class=\"paginate\">Page: $pages->current_page of $pages->num_pages</span><br>";
                  echo "<span class=\"\">Page: $pages->current_page of $pages->num_pages</span><br>";

                  echo "<span class=\"\">".$pages->display_jump_menu()."&nbsp;".$pages->display_items_per_page()."</span><br><br>";

                  echo $pages->display_pages();

            ?>


            <?php
              $vRentPropertyTypeD = $_SESSION['RentPropertyType'];
                  switch ($vRentPropertyTypeD)
                  {
                      case '1':
                          $vRentPTDisplay = 'Residential House / Bungalow / Villa';
                          break;
                      case '2':
                          $vRentPTDisplay = 'Multi-Storey Apartment / Flat';
                          break;
                      case '3':
                          $vRentPTDisplay = 'Commercial Building / Office Space';
                          break;
                  }
            ?>


            <div class=" " style="font-size:16px">
            <hr>
            Location / Place of Property :
            <b><?php echo ucwords($_SESSION['RentPlace']); ?></b>
            <br>
            <hr>
            Type of Property :
            <b><?php echo $vRentPTDisplay; ?></b>
            <br>
              <?php
                if (isset($_SESSION['RentBedroomT1']))
                  if ($_SESSION['RentBedroomT1'] > 0)
                  {
                    echo '<hr>';
                    echo 'No. of Bedrooms : <b>';
                    echo $_SESSION['RentBedroomT1'];
                    echo '</b>';
                  }
                if (isset($_SESSION['RentBedroomT2']))
                  if ($_SESSION['RentBedroomT2'] > 0)
                  {
                  echo '<hr>';
                  echo 'No. of Bedrooms : <b>';
                  echo $_SESSION['RentBedroomT2'];
                  echo '</b>';
                  }
              ?>

            </div>

              <?php
                  while($row = mysqli_fetch_assoc($vResultReSearchRent))
                  {
              ?>
                <hr>
                <div class="btn. btn-default btn-lg btn-block. " style="border: 1px solid #999">
                <a href="property-for-rent-ad.php?pid=<?php echo $row['rapid']; ?>"  class=""
                      title="Property Description :- <?php echo ucfirst($row['description']); ?>"
                      onclick="SearchRentModalSpin();" >

                    <div class=" ">

                <?php
                      switch ($row['ut'])
                      {
                          case 'O':
                              $vRentUTDisplay = 'Owner';
                              break;
                          case 'A':
                              $vRentUTDisplay = 'Agent / Broker';
                              break;
                          case 'B':
                              $vRentUTDisplay = 'Builder';
                              break;
                      }

                    if ($row['title'] != '') {
                      echo '<span style="font-size:24px"> Title : <b>' . ucwords($row['title']) . '</b> </span> <br>'; }
                    else {
                      echo '<span style="font-size:24px"> Title : <b> N.A.</b> </span> <br>'; }

                      echo 'Property ID : <b>' . $row['rapid'] . '</b> <br>';

               //        echo 'Ad. Posted Date : <b>'. substr($row['radate'], 0, 10) . '</b> <br>';

                      echo 'Ad. Post Date : <b>'. date("d M Y", strtotime(substr($row['rapid'], 0, 8))) . '</b><br>';

                      echo 'Posted By : <b>' . $vRentUTDisplay . '</b><br>';

                    if ($row['xc'] != '') {
                      echo 'Ad. Photos/Pictures : <b>' . $row['xc'] . '</b><br>'; }

                      if ($row['rent'] != '') {
                        echo 'Rent : $. <b>' . $row['rent'] . '</b><br>'; }
                      else {
                        echo 'Rent : <b>- Not Given -</b><br>'; }

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
                  <a class="btn btn-warning btn-lg btn-block"
                        href="search-property-for-rent.php"
                        style="color:black">
                      Back to Search-Properties
                  </a>
                </div>

                <br>

          <?php
                }
                else {
          ?>
                  <br>
                  <div class="redmybox" >
                    <br>
                    <h3 style="padding.:0px 0px 0px 0px">
                    Your <br><br>Property-for-Rent <br><br>Search Criteria <br><br>did <b>Not</b> Match <br><br>any Property Ad.
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

        </div>

  <?php
    include ('modal-spin.php');
  ?>

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
