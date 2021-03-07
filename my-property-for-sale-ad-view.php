<?php

include ('login-user-check.php');

$vFlagSaleView = 0;

if ( isset( $_GET["pid"] ) )
{

    require_once ('dbcon.php');

    $vGetSaleViewAdPid = $_GET["pid"];

    $svNkpUid = $_SESSION['SESSION_NKPUID'];

    $vQueryViewSale = "SELECT * FROM `saleads` WHERE `sapid` = '$vGetSaleViewAdPid' AND `nkpuid` = '$svNkpUid' ";
    $vResultViewSale = mysqli_query($dbc, $vQueryViewSale);

    if($vResultViewSale)
    {
      if(mysqli_num_rows($vResultViewSale) == 1)
      {
        //Search Successful

        $vFetchViewSale = mysqli_fetch_assoc($vResultViewSale);

        $vSaleViewAdNum = $vFetchViewSale['sanum'];

        $vSaleViewAdPid = $vFetchViewSale['sapid'];

//        $vSaleViewAdDate = $vFetchViewSale['sadate'];

        $vSaleViewPlace = $vFetchViewSale['place'];

        $vSaleViewUser = $vFetchViewSale['ut'];

        $vSaleViewProp = $vFetchViewSale['pt'];

        $vSaleViewBuiltSize = $vFetchViewSale['built'];
        $vSaleViewLandSize = $vFetchViewSale['land'];

        $vSaleViewUnit = $vFetchViewSale['su'];

        $vSaleViewBed = $vFetchViewSale['nb'];

        $vSaleViewRate = $vFetchViewSale['rate'];
        $vSaleViewPrice = $vFetchViewSale['price'];

        $vSaleViewCPName = $vFetchViewSale['cname'];
        $vSaleViewCPNumber = $vFetchViewSale['cnumber'];
        $vSaleViewCPEmailid = $vFetchViewSale['cemail'];

        $vSaleViewAddress = $vFetchViewSale['address'];
        $vSaleViewTitle = $vFetchViewSale['title'];
        $vSaleViewDescription = $vFetchViewSale['description'];

        $vSaleViewPixCount = $vFetchViewSale['xc'];
        $vSaleViewPixFileNames = $vFetchViewSale['pixfilename'];

        $vFlagSaleView = 1;

/*
        $vSaleViewAdDate = substr($vSaleViewAdDate, 0, 10);
        $vSaleViewAdDate = date("d M Y", strtotime($vSaleViewAdDate));
*/

        $vSaleViewAdDate = date("d M Y", strtotime(substr($vSaleViewAdPid, 0, 8)));

        switch ($vSaleViewUser) {
            case 'O':
                $vSaleViewUser = 'Owner';
                break;
            case 'B':
                $vSaleViewUser = 'Builder';
                break;
            case 'A':
                $vSaleViewUser = 'Agent / Broker';
                break;
        }

        switch ($vSaleViewProp) {
            case '1':
                $vSaleViewProp = 'Vacant Land / Plot / Site';
                break;
            case '2':
                $vSaleViewProp = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vSaleViewProp = 'Independent Bungalow / House / Villa';
                break;
            case '4':
                $vSaleViewProp = 'Commercial Building / Office Space';
                break;
        }

        switch ($vSaleViewUnit) {
            case 'F':
                $vSaleViewUnit = 'Sq.Ft.';
                break;
            case 'M':
                $vSaleViewUnit = 'Sq.Mtrs.';
                break;
            case 'A':
                $vSaleViewUnit = 'Acres';
                break;
        }

        if ($vSaleViewPixCount != '0')
        {
          $vExplodeSaleViewPixFileNames = explode(" ",$vSaleViewPixFileNames);
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

if ($vFlagSaleView == 0)
{
header('Location: user-dashboard.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>View Property for Sale Ad. <?php include ('title-tag.php'); ?></title>

  <?php
    include ('head-tag.php');
  ?>

<style>
#advdisplay {
background-color: white;
zcolor: black;
font-weight:bold;
padding: px;
}
#advdisp label {
font-weight:normal;
}
</style>

<script type="text/javascript">

var SaleEditPixAddSubmitted = 0;
function SaleEditPixAddSubmitOnce()
{
   if(!SaleEditPixAddSubmitted)
   {
      SaleEditPixAddSubmitted ++;
      document.SaleEditPixAddForm.SalePixAddSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

var SaleEditPixChangeSubmitted = 0;
function SaleEditPixChangeSubmitOnce()
{
   if(!SaleEditPixChangeSubmitted)
   {
      SaleEditPixChangeSubmitted ++;
      document.SaleEditPixChangeForm.SalePixChangeSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}


var ViewSaleSubmitted = 0;
function SaleViewSubmitOnce()
{
   if(!ViewSaleSubmitted)
   {
      ViewSaleSubmitted ++;
      document.SaleViewForm.SaleViewSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}


var DeleteSaleSubmitted = 0;
function SaleDeleteSubmitOnce()
{
   if(!DeleteSaleSubmitted)
   {
      DeleteSaleSubmitted ++;
      document.SaleDeleteForm.SaleDeleteSubmit.value = 'Deleting, Please Wait...';
      $('#DeletingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}


</script>

</head>

<body>

  <?php
    include ('navbar-in.php');
  ?>

  <div class="section-colored  center-block text-center ">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3 " >

            <h2 class="text-center" >View Property-for-Sale Ad.</h2>

            <hr>

            <?php
            if ( ( isset( $_GET["pid"] ) ) && ($vFlagSaleView == 1) )
            {
            ?>

            <div id='advdisp' class=' btn-block btn.-default ' style='background-color: ; '>

              <label>Property ID</label>
              <div id='advdisplay' class='btn-lg'>
                <?php echo $vSaleViewAdPid; ?>
              </div>
              <hr>

              <label>Ad. Post Date</label>
              <div id='advdisplay' class='btn-lg'>
                <?php echo $vSaleViewAdDate; ?>
              </div>
              <hr>

              <label>Location / Place of Property</label>
              <div id='advdisplay' class='btn-lg'>
                <?php echo ucwords($vSaleViewPlace); ?>
              </div>
              <hr>

              <label>Ad. Posted By</label>
              <div id='advdisplay' class='btn-lg'>
                <?php echo $vSaleViewUser; ?>
              </div>
              <hr>

              <label>Type of Property</label>
              <div id='advdisplay' class='btn-lg'>
                <?php echo $vSaleViewProp; ?>
              </div>
              <hr>

              <?php
              if ($vSaleViewBed != '-') {
              ?>
              <label>No. of Bedroom(s)</label>
              <div id='advdisplay' class='btn-lg'>
                <?php if ($vSaleViewBed == '+') { $vSaleViewBed = '10+' ; }
                echo $vSaleViewBed.' &nbsp;(BHK)';
                ?>
              </div>
              <hr>
              <?php
              }
              ?>

              <?php
              if ($vSaleViewBuiltSize != '-') {
              ?>
               <label>Built-Up Area Size</label>
              <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vSaleViewBuiltSize != '') {
                echo $vSaleViewBuiltSize;
              ?>
                <span style="font-size:14px;font-weight:normal;">
                <?php echo $vSaleViewUnit; ?>
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
              if ($vSaleViewLandSize != '-') {
              ?>
              <label>Land Area Size</label>
              <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vSaleViewLandSize != '') {
                echo $vSaleViewLandSize;
              ?>
                <span style="font-size:14px;font-weight:normal;">
                <?php echo $vSaleViewUnit; ?>
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
              if ($vSaleViewRate != '') {
              ?>
                <span style="font-size:15px;font-weight:normal;">
                $
                </span>
                <?php echo $vSaleViewRate; ?>
                <span style="font-size:14px;font-weight:normal;">
                per <?php echo $vSaleViewUnit; ?>
                </span>
              <?php
              } else { echo '--'; }
              ?>
              </div>
              <hr>


              <label>Total Price of Property</label>
              <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vSaleViewPrice != '') {
              ?>
                <span style="font-size:15px;font-weight:normal;">
                 $ 
                </span>
              <?php
                echo $vSaleViewPrice;
              } else { echo '--'; }
              ?>
              </div>
              <hr>

              <label>Name of Contact Person</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewCPName != '') {
                  echo ucwords($vSaleViewCPName);
                } else { echo '--'; }
                ?>
              </div>
              <hr>

              <label>Number(s) of Contact Person</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewCPNumber != '') {
                  echo $vSaleViewCPNumber;
                } else { echo '--'; }
                ?>
              </div>
              <hr>

              <label>Email ID of Contact Person</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewCPEmailid != '') {
                  echo strtolower($vSaleViewCPEmailid);
                } else { echo '--'; }
                ?>
              </div>
              <hr>

              <label>Address of Property</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewAddress != '') {
                  echo ucwords($vSaleViewAddress);
                } else { echo '--'; }
                ?>
              </div>

              <hr>

              <label>Title / Subject of Property</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewTitle != '') {
                  echo ucwords($vSaleViewTitle);
                } else { echo '--'; }
                ?>
              </div>

              <hr>

              <label>Description / Details of Property</label>
              <div id='advdisplay' class='btn-lg'>
                <?php
                if ($vSaleViewDescription != '') {
                  echo ucfirst($vSaleViewDescription);
                } else { echo '--'; }
                ?>
              </div>

              <hr>

              <?php
              if ($vSaleViewPixCount != '0')
              {
              ?>

                <label>Photos / Pictures of Property</label>
                <div class="text-center">
                  <?php
                  foreach ($vExplodeSaleViewPixFileNames as $vExplodeSaleViewPixFileNamesValue)
                  {
                  ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="<?php echo 'saleadpix/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleViewPixFileNamesValue; ?>"
                              data-lightbox="SaleViewLightBox" title="<?php echo $vExplodeSaleViewPixFileNamesValue; ?>">
                           <img class="img-responsive img-home-portfolio" name="MySaleAdImage"
                              alt="<?php echo $vExplodeSaleViewPixFileNamesValue; ?>" title="<?php echo $vExplodeSaleViewPixFileNamesValue; ?>"
                              src="<?php echo 'saleadpix/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleViewPixFileNamesValue; ?>"
                              style="display: block; margin: 9px auto;" />
                        </a>
                    </div>
                    <h5><?php echo $vExplodeSaleViewPixFileNamesValue; ?></h5>

                    <hr>

                  <?php
                  }
                  ?>

                </div>

              <?php
              }
              else {
              ?>
              <hr>
              <?php
              }
              ?>

              <br>

              <?php
              if ($vSaleViewPixCount == '0')
              {
              ?>

                <form class="form" id="SaleEditPixAddForm" name="SaleEditPixAddForm"
                            method="post" action="my-property-for-sale-ad-pix.php"
                            onsubmit="return SaleEditPixAddSubmitOnce(); " >

                  <div class="form-group  ">
                    <input type="hidden" name="SaleEditPixPid" value="<?php echo $vSaleViewAdPid; ?>" >

                      <div class="btnbgc">
                        <input class="btn btn-success btn-lg btn-block" type="submit"
                                    name="SalePixAddSubmit" value="Add Photo(s)"  style="color:black"  >
                      </div>

                  </div>

                </form>

              <?php
              }
              else
              {
              ?>

                <form class="form" id="SaleEditPixChangeForm" name="SaleEditPixChangeForm"
                            method="post" action="my-property-for-sale-ad-pix.php"
                            onsubmit="return SaleEditPixChangeSubmitOnce(); " >

                  <div class="form-group  ">

                    <input type="hidden" name="SaleEditPixPid" value="<?php echo $vSaleViewAdPid; ?>" >
                    <input type="hidden" name="SaleEditPixCount" value="<?php echo $vSaleViewPixCount; ?>" >
                    <input type="hidden" name="SaleEditPixFileNames" value="<?php echo $vSaleViewPixFileNames; ?>" >

                    <div class="btnbgc">
                      <input class="btn btn-success btn-lg btn-block" type="submit"
                                  name="SalePixChangeSubmit" value="Edit Photo(s)"  style="color:black"  >
                    </div>
                    Click <b>Edit Photo(s)</b> Button to Change / Delete Photo(s) only.

                  </div>

                </form>

              <?php
              }
              ?>

              <hr>
              <br>

              <form class="form" id="SaleViewForm" name="SaleViewForm"
                          method="post" action="my-property-for-sale-ad-edit.php"
                          onsubmit="return SaleViewSubmitOnce(); " >

                <div class="form-group  ">
                  <input type="hidden" name="SaleViewAdPid" value="<?php echo $vSaleViewAdPid; ?>" />

<!--
                  <input type="hidden" name="SaleViewPixCount" value="<?php // echo $vSaleViewPixCount; ?>" />
                  <input type="hidden" name="SaleViewPixFileNames" value="<?php // echo $vSaleViewPixFileNames; ?>" />
                  <input type="hidden" name="SaleViewHidden" value="TRUE" />
-->

                  <div class="btnbgc">
                    <input class="btn btn-primary btn-lg btn-block" type="submit"
                                name="SaleViewSubmit" value="Edit this Ad."  style="color:black."  >
                  </div>

                </div>

              </form>

<!--
                  Click <b>Edit this Ad.</b> Button to Change Ad. Details.

              <div class="form-group">
                <div id="spin"></div>
              </div>
-->

              <hr>
              <br>

              <form class="form" id="SaleDeleteForm" name="SaleDeleteForm"
                          method="post" action="my-property-for-sale-ad-delete.php"
                          onsubmit="return SaleDeleteSubmitOnce(); " >

                <div class="form-group  ">
                  <input type="hidden" name="SaleDeleteAdNum" value="<?php echo $vSaleViewAdNum; ?>" />
                  <input type="hidden" name="SaleDeletePixCount" value="<?php echo $vSaleViewPixCount; ?>" />
                  <input type="hidden" name="SaleDeletePixFileNames" value="<?php echo $vSaleViewPixFileNames; ?>" />
                  <input type="hidden" name="SaleDeleteHidden" value="TRUE" />

                  <div class="btnbgc">
                    <input class="btn btn-danger btn-lg btn-block" type="submit"
                                name="SaleDeleteSubmit" value="Delete this Ad."  style="color:black."  >
                  </div>
                </div>

              </form>

              <hr>
              <br>

<!--
              <div class="btnbgc">
                <button class="btn btn-default btn-lg btn-block" onclick="window.history.back();" style="color:black.">Back to Ad. List</button>
              </div>
-->

            <div id="" class="btnbgc">
              <a href="my-property-ad-list.php" class="btn btn-warning btn-lg btn-block" style="color:black">
                Back to Ad. List
              </a>
            </div>

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
    include ('modal-spin.php');
  ?>

  <?php
    include ('footer.php');
  ?>

</body>

</html>
