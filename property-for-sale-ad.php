<?php
session_start();

$vFlagForSale = 0;

if ( isset( $_GET["pid"] ) )
{

    require_once ('dbcon.php');

    $vGetAdPidForSale = $_GET["pid"];

    $vQuerySelectForSale = "SELECT * FROM `saleads` WHERE `sapid` = '$vGetAdPidForSale' ";
    $vResultSelectForSale = mysqli_query($dbc, $vQuerySelectForSale);

    if($vResultSelectForSale)
    {
      if(mysqli_num_rows($vResultSelectForSale) == 1)
      {
        //Search Successful

        $vFetchForSale = mysqli_fetch_assoc($vResultSelectForSale);

        $vAdNumForSale = $vFetchForSale['sanum'];

        $vNkpUidForSale = $vFetchForSale['nkpuid'];

        $vAdPidForSale = $vFetchForSale['sapid'];

//        $vAdDateForSale = $vFetchForSale['sadate'];

        $vPlaceForSale = $vFetchForSale['place'];

        $vPropTypeForSale = $vFetchForSale['pt'];
        $vUserTypeForSale = $vFetchForSale['ut'];

        $vBuiltSizeForSale = $vFetchForSale['built'];
        $vLandSizeForSale = $vFetchForSale['land'];

        $vUnitForSale = $vFetchForSale['su'];
        $vBedroomForSale = $vFetchForSale['nb'];

        $vRateForSale = $vFetchForSale['rate'];
        $vPriceForSale = $vFetchForSale['price'];

        $vCPNameForSale = $vFetchForSale['cname'];
        $vCPNumberForSale = $vFetchForSale['cnumber'];
        $vCPEmailidForSale = $vFetchForSale['cemail'];

        $vAddressForSale = $vFetchForSale['address'];
        $vTitleForSale = $vFetchForSale['title'];
        $vDescriptionForSale = $vFetchForSale['description'];

        $vPixCountForSale = $vFetchForSale['xc'];
        $vPixFileNameForSale = $vFetchForSale['pixfilename'];

        $vFlagForSale = 1;

/*
        $vAdDateForSale = substr($vAdDateForSale, 0, 10);
        $vAdDateForSale = date("d M Y", strtotime($vAdDateForSale));

        $vAdDateForSale = substr($vAdPidForSale, 0, 8);
        $vAdDateForSale = date("d M Y", strtotime($vAdDateForSale));
*/

        $vAdDateForSale = date("d M Y", strtotime(substr($vAdPidForSale, 0, 8)));

        switch ($vUserTypeForSale)
        {
            case 'O':
                $vUserTypeForSale = 'Owner';
                break;
            case 'B':
                $vUserTypeForSale = 'Builder';
                break;
            case 'A':
                $vUserTypeForSale = 'Agent / Broker';
                break;
        }

        switch ($vPropTypeForSale)
        {
            case '1':
                $vPropTypeForSale = 'Vacant Land / Plot / Site';
                break;
            case '2':
                $vPropTypeForSale = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vPropTypeForSale = 'Independent Bungalow / House / Villa';
                break;
            case '4':
                $vPropTypeForSale = 'Commercial Building / Office Space';
                break;
        }

        switch ($vUnitForSale)
        {
            case 'F':
                $vUnitForSale = 'Sq.Ft.';
                break;
            case 'M':
                $vUnitForSale = 'Sq.Mtrs.';
                break;
            case 'A':
                $vUnitForSale = 'Acres';
                break;
        }


        if ($vPixCountForSale != '0') {
          $vExplodePixFileNameForSale = explode(" ",$vPixFileNameForSale);
        }

        mysqli_close($dbc);

      }
    }
    else
    {
      mysqli_close($dbc);
      die("Query failed");
    }

}

if ($vFlagForSale == 0)
{
header('Location: search-property.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

<title>Property-for-Sale Ad. <?php include ('title-tag.php'); ?></title>

<style>
  #advdisplay
  {
    background-color: white;
    zcolor: black;
    font-weight:bold;
    padding: px;
  }

  #advdisp label {
  font-weight:normal;
  }
</style>

</head>

<body>

  <?php
    if  (isset($_SESSION['SESSION_NKPUID'])) {
      include ('navbar-in.php'); }
    else {
      include ('navbar.php'); }
  ?>

  <div class="section-colored center-block text-center">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3" >

          <h2 class="text-center" >Property-for-Sale Ad.</h2>


          <hr>

          <?php
          if ( ( isset( $_GET["pid"] ) ) && ($vFlagForSale == 1) )
          {

          ?>

          <div id='advdisp' class=' btn-block tn-default ' style='background-color: ; '>



          <?php
          if ($vPixCountForSale != '0') {
          ?>
          <!--
          <hr>
          -->
          <label>Photos / Pictures of Property</label>
          <div>
            <?php
            foreach ($vExplodePixFileNameForSale as $vEachPixFileNameForSale)
            {
            ?>
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <a href="<?php echo 'sap/' . $vNkpUidForSale . "/" . $vEachPixFileNameForSale; ?>"
                        data-lightbox="SaleAdPixImageLightBox" title="<?php echo $vEachPixFileNameForSale; ?>">
                     <img class="img-responsive img-home-portfolio" name="SaleAdPixImage"
                        alt="<?php echo $vEachPixFileNameForSale; ?>" title="<?php echo $vEachPixFileNameForSale; ?>"
                        src="<?php echo 'sap/' . $vNkpUidForSale . "/" . $vEachPixFileNameForSale; ?>"
                        style="display: block; margin: 9px auto;" />
                  </a>
              </div>
              <h5><?php echo $vEachPixFileNameForSale; ?></h5>
              <hr>
            <?php
            }
            ?>

          </div>

          <?php
          }
          ?>



          <label>Property ID</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vAdPidForSale; ?>
          </div>
          <hr>

          <label>Ad. Post Date</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vAdDateForSale; ?>
          </div>
          <hr>

          <label>Location / Place of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo ucwords($vPlaceForSale); ?>
          </div>
          <hr>

          <label>Ad. Posted By</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vUserTypeForSale; ?>
          </div>
          <hr>

          <label>Type of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vPropTypeForSale; ?>
          </div>
          <hr>

          <?php
          if ($vBedroomForSale != '-') {
          ?>
          <label>No. of Bedroom(s)</label>
          <div id='advdisplay' class='btn-lg'>
          <?php if ($vBedroomForSale == '+') { $vBedroomForSale = '10+' ; }
            echo $vBedroomForSale.' &nbsp;(BHK)'; ?>
          </div>
          <hr>
          <?php
          }
          ?>

          <?php
          if ($vBuiltSizeForSale != '-') {
          ?>
          <label>Built-Up Area Size</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vBuiltSizeForSale != '') {
            echo $vBuiltSizeForSale;
          ?>&nbsp;
            <span style="font-size:14px;font-weight:normal;">
            <?php echo $vUnitForSale; ?>
            </span>
          <?php
          } else { echo '--'; }
          ?>
          </div>
          <hr>
          <?php
          }
          ?>

          <?php
          if ($vLandSizeForSale != '-') {
          ?>
          <label>Land Area Size</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vLandSizeForSale != '') {
            echo $vLandSizeForSale;
          ?>&nbsp;
            <span style="font-size:14px;font-weight:normal;">
            <?php echo $vUnitForSale; ?>
            </span>
          <?php
          } else { echo '--'; }
          ?>
          </div>
          <hr>
          <?php
          }
          ?>

          <label>Rate of Property</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vRateForSale != '') {
          ?>
            <span style="font-size:15px;font-weight:normal;">
            $.&nbsp;
            </span>
            <?php echo $vRateForSale; ?>&nbsp;
            <span style="font-size:14px;font-weight:normal;">
            per <?php echo $vUnitForSale; ?>
            </span>
          <?php
          } else { echo '--'; }
          ?>
          </div>
          <hr>

          <label>Total Price of Property</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vPriceForSale != '') {
          ?>
            <span style="font-size:15px;font-weight:normal;">
             $.&nbsp;
            </span>
          <?php
            echo $vPriceForSale;
          } else { echo '--'; }
          ?>
          </div>
          <hr>

          <label>Name of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPNameForSale != '') {
            echo ucwords($vCPNameForSale);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Number(s) of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPNumberForSale != '') {
            echo $vCPNumberForSale;
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Email ID of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPEmailidForSale != '') {
            echo strtolower($vCPEmailidForSale);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Address of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vAddressForSale != '') {
            echo ucwords($vAddressForSale);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Title / Subject of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vTitleForSale != '') {
            echo ucwords($vTitleForSale);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Description / Details of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vDescriptionForSale != '') {
            echo ucfirst($vDescriptionForSale);
            } else { echo '--'; }
            ?>
          </div>
          <hr>




          <?php
          if (isset($_SESSION['adv']))
          {
          ?>
            <br>
            <div class="btnbgc">
              <button class="btn btn-info btn-lg btn-block" onclick="window.history.back();" style="color:black">Back to Search Results</button>
            </div>
            <br>
          <?php
          }
          else {
            echo '<br>' ;
          }
          ?>

          </div>

          <?php
          }
          ?>

          <hr>

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
