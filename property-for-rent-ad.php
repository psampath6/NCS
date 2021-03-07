<?php
session_start();

$vFlagForRent = 0;

if ( isset( $_GET["pid"] ) )
{

    require_once ('dbcon.php');

    $vGetAdPidForRent = $_GET["pid"];

    $vQuerySelectForRent = "SELECT * FROM `rentads` WHERE `rapid` = '$vGetAdPidForRent' ";
    $vResultSelectForRent = mysqli_query($dbc, $vQuerySelectForRent);

    if($vResultSelectForRent)
    {
      if(mysqli_num_rows($vResultSelectForRent) == 1)
      {
        //Search Successful

        $vFetchForRent = mysqli_fetch_assoc($vResultSelectForRent);

        $vAdNumForRent = $vFetchForRent['ranum'];

        $vNkpUidForRent = $vFetchForRent['nkpuid'];

        $vAdPidForRent = $vFetchForRent['rapid'];

//        $vAdDateForRent = $vFetchForRent['radate'];

        $vPlaceForRent = $vFetchForRent['place'];

        $vPropTypeForRent = $vFetchForRent['pt'];
        $vUserTypeForRent = $vFetchForRent['ut'];

        $vBuiltSizeForRent = $vFetchForRent['built'];

        $vUnitForRent = $vFetchForRent['su'];
        $vBedroomForRent = $vFetchForRent['nb'];

        $vDepositAmtForRent = $vFetchForRent['deposit'];
        $vRentAmtForRent = $vFetchForRent['rent'];

        $vCPNameForRent = $vFetchForRent['cname'];
        $vCPNumberForRent = $vFetchForRent['cnumber'];
        $vCPEmailidForRent = $vFetchForRent['cemail'];

        $vAddressForRent = $vFetchForRent['address'];
        $vTitleForRent = $vFetchForRent['title'];
        $vDescriptionForRent = $vFetchForRent['description'];

        $vPixCountForRent = $vFetchForRent['xc'];
        $vPixFileNameForRent = $vFetchForRent['pixfilename'];

        $vFlagForRent = 1;

/*
        $vAdDateForRent = substr($vAdDateForRent, 0, 10);
        $vAdDateForRent = date("d M Y", strtotime($vAdDateForRent));

        $vAdDateForRent = substr($vAdPidForRent, 0, 8);
        $vAdDateForRent = date("d M Y", strtotime($vAdDateForRent));
*/

        $vAdDateForRent = date("d M Y", strtotime(substr($vAdPidForRent, 0, 8)));

        switch ($vUserTypeForRent)
        {
            case 'O':
                $vUserTypeForRent = 'Owner';
                break;
            case 'B':
                $vUserTypeForRent = 'Builder';
                break;
            case 'A':
                $vUserTypeForRent = 'Agent / Broker';
                break;
        }

        switch ($vPropTypeForRent) {
            case '1':
                $vPropTypeForRent = 'Residential House / Bungalow / Villa';
                break;
            case '2':
                $vPropTypeForRent = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vPropTypeForRent = 'Commercial Building / Office Space';
                break;
        }

        switch ($vUnitForRent) {
            case 'F':
                $vUnitForRent = 'Sq.Ft.';
                break;
            case 'M':
                $vUnitForRent = 'Sq.Mtrs.';
                break;
            case 'A':
                $vUnitForRent = 'Acres';
                break;
        }

        if ($vPixCountForRent != '0') {
          $vExplodePixFileNameForRent = explode(" ",$vPixFileNameForRent);
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

if ($vFlagForRent == 0)
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

<title>Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

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

  <div class="section-colored  center-block text-center ">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 " >

          <h2 class="text-center" >Property-for-Rent Ad.</h2>

          <hr>

          <?php
          if ( ( isset( $_GET["pid"] ) ) && ($vFlagForRent == 1) )
          {

          ?>

          <div id='advdisp' class=' btn-block tn-default ' style='background-color: ; '>


          <?php
          if ($vPixCountForRent != '0') {
          ?>
          <!--
          <hr>
          -->
          <label>Photos / Pictures of Property</label>
          <div>
            <?php
              foreach ($vExplodePixFileNameForRent as $vEachPixFileNameForRent)
              {
            ?>
              <div class="col-lg-12 col-md-12 col-sm-12">
                  <a href="<?php echo 'rap/' . $vNkpUidForRent . "/" . $vEachPixFileNameForRent; ?>"
                        data-lightbox="RentAdPixImageLightBox" title="<?php echo $vEachPixFileNameForRent; ?>">
                     <img class="img-responsive img-home-portfolio" name="RentAdPixImage"
                        alt="<?php echo $vEachPixFileNameForRent; ?>" title="<?php echo $vEachPixFileNameForRent; ?>"
                        src="<?php echo 'rap/' . $vNkpUidForRent . "/" . $vEachPixFileNameForRent; ?>"
                        style="display: block; margin: 9px auto;" />
                  </a>
              </div>
              <h5><?php echo $vEachPixFileNameForRent; ?></h5>
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
            <?php echo $vAdPidForRent; ?>
          </div>
          <hr>

          <label>Ad. Post Date</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vAdDateForRent; ?>
          </div>
          <hr>

          <label>Location of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo ucwords($vPlaceForRent); ?>
          </div>
          <hr>

          <label>Ad. Posted By</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vUserTypeForRent; ?>
          </div>
          <hr>

          <label>Type of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php echo $vPropTypeForRent; ?>
          </div>
          <hr>

          <?php
          if ($vBedroomForRent != '-') {
          ?>
          <label>No. of Bedroom(s)</label>
          <div id='advdisplay' class='btn-lg'>
          <?php if ($vBedroomForRent == '+') { $vBedroomForRent = '10+' ; }
            echo $vBedroomForRent.' &nbsp;(BHK)'; ?>
          </div>
          <hr>
          <?php
          }
          ?>

          <?php
          if ($vBuiltSizeForRent != '-') {
          ?>
          <label>Built-Up Area Size</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vBuiltSizeForRent != '') {
              echo $vBuiltSizeForRent;
          ?>
              <span style="font-size:14px;font-weight:normal;">
                <?php echo $vUnitForRent; ?>
              </span>
          <?php
          } else { echo '--'; }
          ?>
          </div>
          <hr>
          <?php
          }
          ?>

          <label>Security Deposit Amount</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vDepositAmtForRent != '') {
          ?>
            <span style="font-size:15px;font-weight:normal;">
            $.
            </span>
          <?php
            echo $vDepositAmtForRent;
          } else { echo '--'; }
          ?>
          </div>
          <hr>


          <label>Rent Amount</label>
          <div id='advdisplay' class='btn-lg'>
          <?php
          if ($vRentAmtForRent != '') {
          ?>
            <span style="font-size:15px;font-weight:normal;">
             $.
            </span>
          <?php
            echo $vRentAmtForRent;
          } else { echo '--'; }
          ?>
          </div>
          <hr>

          <label>Name of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPNameForRent != '') {
            echo ucwords($vCPNameForRent);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Number(s) of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPNumberForRent != '') {
            echo $vCPNumberForRent;
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Email ID of Contact Person</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vCPEmailidForRent != '') {
            echo strtolower($vCPEmailidForRent);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Address of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vAddressForRent != '') {
            echo ucwords($vAddressForRent);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Title / Subject of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vTitleForRent != '') {
            echo ucwords($vTitleForRent);
            } else { echo '--'; }
            ?>
          </div>
          <hr>

          <label>Description / Details of Property</label>
          <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vDescriptionForRent != '') {
            echo ucfirst($vDescriptionForRent);
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
            <button class="btn btn-warning btn-lg btn-block" onclick="window.history.back();" style="color:black">Back to Search Results</button>
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
