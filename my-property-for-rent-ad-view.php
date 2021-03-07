<?php

include ('login-user-check.php');

$vFlagRentView = 0;

if ( isset( $_GET["pid"] ) )
{

    require_once ('dbcon.php');

    $vGetRentViewAdPid = $_GET["pid"];

    $svNkpUid = $_SESSION['SESSION_NKPUID'];

    $vQueryViewRent = "SELECT * FROM `rentads` WHERE `rapid` = '$vGetRentViewAdPid' AND `nkpuid` = '$svNkpUid' ";
    $vResultViewRent = mysqli_query($dbc, $vQueryViewRent);

    if($vResultViewRent)
    {
      if(mysqli_num_rows($vResultViewRent) == 1)
      {
        //Search Successful

        $vFetchViewRent = mysqli_fetch_assoc($vResultViewRent);

        $vRentViewAdNum = $vFetchViewRent['ranum'];

        $vRentViewAdPid = $vFetchViewRent['rapid'];

//        $vRentViewAdDate = $vFetchViewRent['radate'];

        $vRentViewPlace = $vFetchViewRent['place'];

        $vRentViewUser = $vFetchViewRent['ut'];

        $vRentViewProp = $vFetchViewRent['pt'];

        $vRentViewBuiltSize = $vFetchViewRent['built'];

        $vRentViewUnit = $vFetchViewRent['su'];

        $vRentViewBed = $vFetchViewRent['nb'];


        $vRentViewDepositAmt = $vFetchViewRent['deposit'];
        $vRentViewRentAmt = $vFetchViewRent['rent'];

        $vRentViewCPName = $vFetchViewRent['cname'];
        $vRentViewCPNumber = $vFetchViewRent['cnumber'];
        $vRentViewCPEmailid = $vFetchViewRent['cemail'];

        $vRentViewAddress = $vFetchViewRent['address'];
        $vRentViewTitle = $vFetchViewRent['title'];
        $vRentViewDescription = $vFetchViewRent['description'];

        $vRentViewPixCount = $vFetchViewRent['xc'];
        $vRentViewPixFileNames = $vFetchViewRent['pixfilename'];

        $vFlagRentView = 1;

/*
        $vRentViewAdDate = substr($vRentViewAdDate, 0, 10);
        $vRentViewAdDate = date("d M Y", strtotime($vRentViewAdDate));
*/

        $vRentViewAdDate = date("d M Y", strtotime(substr($vRentViewAdPid, 0, 8)));

        switch ($vRentViewUser) {
            case 'O':
                $vRentViewUser = 'Owner';
                break;
            case 'B':
                $vRentViewUser = 'Builder';
                break;
            case 'A':
                $vRentViewUser = 'Agent / Broker';
                break;
        }

        switch ($vRentViewProp) {
            case '1':
                $vRentViewProp = 'Residential House / Bungalow / Villa';
                break;
            case '2':
                $vRentViewProp = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vRentViewProp = 'Commercial Building / Office Space';
                break;
        }

        switch ($vRentViewUnit) {
            case 'F':
                $vRentViewUnit = 'Sq.Ft.';
                break;
            case 'M':
                $vRentViewUnit = 'Sq.Mtrs.';
                break;
            case 'A':
                $vRentViewUnit = 'Acres';
                break;
        }

        if ($vRentViewPixCount > 0) {
          $vExplodeRentViewPixFileNames = explode(" ",$vRentViewPixFileNames);
//          print_r ($vexpxsnm);
//          echo count($vexpxsnm);
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

if ($vFlagRentView == 0)
{
header('Location: user-dashboard.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>View Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>

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

var RentEditPixAddSubmitted = 0;
function RentEditPixAddSubmitOnce()
{
   if(!RentEditPixAddSubmitted)
   {
      RentEditPixAddSubmitted ++;
      document.RentEditPixAddForm.RentPixAddSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

var RentEditPixChangeSubmitted = 0;
function RentEditPixChangeSubmitOnce()
{
   if(!RentEditPixChangeSubmitted)
   {
      RentEditPixChangeSubmitted ++;
      document.RentEditPixChangeForm.RentPixChangeSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

var ViewRentSubmitted = 0;
function RentViewSubmitOnce()
{
   if(!ViewRentSubmitted)
   {
      ViewRentSubmitted ++;
      document.RentViewForm.RentViewSubmit.value = 'Loading, Please Wait...';
      $('#LoadingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}


var DeleteRentSubmitted = 0;
function RentDeleteSubmitOnce()
{
   if(!DeleteRentSubmitted)
   {
      DeleteRentSubmitted ++;
      document.RentDeleteForm.RentDeleteSubmit.value = 'Deleting, Please Wait...';
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

      <div class="row ">

        <div class="col-md-6 col-md-offset-3 " >

          <h2 class="text-center" >View Property-for-Rent Ad.</h2>

          <hr>

          <?php
          if ( ( isset( $_GET["pid"] ) ) && ($vFlagRentView == 1) )
          {
          ?>

          <div id='advdisp' class=' btn-block btn.-default ' style='background-color: ; '>

            <label>Property ID</label>
            <div id='advdisplay' class='btn-lg'>
              <?php echo $vRentViewAdPid; ?>
            </div>
            <hr>

            <label>Ad. Post Date</label>
            <div id='advdisplay' class='btn-lg'>
              <?php echo $vRentViewAdDate; ?>
            </div>
            <hr>

            <label>Location / Place of Property</label>
            <div id='advdisplay' class='btn-lg'>
              <?php echo ucwords($vRentViewPlace); ?>
            </div>
            <hr>

            <label>Ad. Posted By</label>
            <div id='advdisplay' class='btn-lg'>
              <?php echo $vRentViewUser; ?>
            </div>
            <hr>

            <label>Type of Property</label>
            <div id='advdisplay' class='btn-lg'>
              <?php echo $vRentViewProp; ?>
            </div>
            <hr>


            <?php
            if ($vRentViewBed != '-') {
            ?>
            <label>No. of Bedroom(s)</label>
            <div id='advdisplay' class='btn-lg'>
            <?php if ($vRentViewBed == '+') { $vRentViewBed = '10+' ; }
              echo $vRentViewBed.' &nbsp;(BHK)'; ?>
            </div>
            <hr>
            <?php
            }
            ?>


            <?php
            if ($vRentViewBuiltSize != '-') {
            ?>
             <label>Built-Up Area Size</label>
            <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vRentViewBuiltSize != '') {
                echo $vRentViewBuiltSize;
            ?>
                <span style="font-size:14px;font-weight:normal;">
                  <?php echo $vRentViewUnit; ?>
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
            if ($vRentViewDepositAmt != '') {
            ?>
              <span style="font-size:15px;font-weight:normal;">
              $.
              </span>
            <?php
              echo $vRentViewDepositAmt;
            } else { echo '--'; }
            ?>
            </div>
            <hr>

            <label>Rent Amount</label>
            <div id='advdisplay' class='btn-lg'>
            <?php
            if ($vRentViewRentAmt != '') {
            ?>
              <span style="font-size:15px;font-weight:normal;">
               $. 
              </span>
            <?php
              echo $vRentViewRentAmt;
            } else { echo '--'; }
            ?>
            </div>
            <hr>

            <label>Name of Contact Person</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewCPName != '') {
                echo ucwords($vRentViewCPName);
              } else { echo '--'; }
              ?>
            </div>
            <hr>

            <label>Number(s) of Contact Person</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewCPNumber != '') {
                echo $vRentViewCPNumber;
              } else { echo '--'; }
              ?>
            </div>
            <hr>

            <label>Email ID of Contact Person</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewCPEmailid != '') {
                echo strtolower($vRentViewCPEmailid);
              } else { echo '--'; }
              ?>
            </div>
            <hr>

            <label>Address of Property</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewAddress != '') {
                echo ucwords($vRentViewAddress);
              } else { echo '--'; }
              ?>
            </div>
            <hr>

            <label>Title / Subject of Property</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewTitle != '') {
                echo ucwords($vRentViewTitle);
              } else { echo '--'; }
              ?>
            </div>
            <hr>

            <label>Description / Details of Property</label>
            <div id='advdisplay' class='btn-lg'>
              <?php
              if ($vRentViewDescription != '') {
                echo ucfirst($vRentViewDescription);
              } else { echo '--'; }
              ?>
            </div>

            <hr>

            <?php
            if ($vRentViewPixCount != '0')
            {
            ?>

            <label>Photos / Pictures of Property</label>
            <div class="text-center">
              <?php
              foreach ($vExplodeRentViewPixFileNames as $vExplodeRentViewPixFileNamesValue)
              {
              ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <a href="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentViewPixFileNamesValue; ?>"
                          data-lightbox="RentViewLightBox" title="<?php echo $vExplodeRentViewPixFileNamesValue; ?>">
                       <img class="img-responsive img-home-portfolio" name="MyRentAdImage"
                          alt="<?php echo $vExplodeRentViewPixFileNamesValue; ?>"
                          title="<?php echo $vExplodeRentViewPixFileNamesValue; ?>"
                          src="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentViewPixFileNamesValue; ?>"
                          style="display: block; margin: 9px auto;" />
                    </a>
                </div>
                <h5><?php echo $vExplodeRentViewPixFileNamesValue; ?></h5>

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
              if ($vRentViewPixCount == '0')
              {
              ?>

                <form class="form" id="RentEditPixAddForm" name="RentEditPixAddForm"
                            method="post" action="my-property-for-rent-ad-pix.php"
                            onsubmit="return RentEditPixAddSubmitOnce(); " >

                  <div class="form-group  ">
                    <input type="hidden" name="RentEditPixPid" value="<?php echo $vRentViewAdPid; ?>" >

                      <div class="btnbgc">
                        <input class="btn btn-success btn-lg btn-block" type="submit"
                                    name="RentPixAddSubmit" value="Add Photo(s)"  style="color:black"  >
                      </div>

                  </div>

                </form>

              <?php
              }
              else
              {
              ?>

                <form class="form" id="RentEditPixChangeForm" name="RentEditPixChangeForm"
                            method="post" action="my-property-for-rent-ad-pix.php"
                            onsubmit="return RentEditPixChangeSubmitOnce(); " >

                  <div class="form-group  ">

                    <input type="hidden" name="RentEditPixPid" value="<?php echo $vRentViewAdPid; ?>" >
                    <input type="hidden" name="RentEditPixCount" value="<?php echo $vRentViewPixCount; ?>" >
                    <input type="hidden" name="RentEditPixFileNames" value="<?php echo $vRentViewPixFileNames; ?>" >

                    <div class="btnbgc">
                      <input class="btn btn-success btn-lg btn-block" type="submit"
                                  name="RentPixChangeSubmit" value="Edit Photo(s)"  style="color:black"  >
                    </div>
                    Click <b>Edit Photo(s)</b> Button to Change / Delete Photo(s) only.

                  </div>

                </form>

              <?php
              }
              ?>

              <hr>
              <br>


            <form class="form" id="RentViewForm" name="RentViewForm"
                        method="post" action="my-property-for-rent-ad-edit.php"
                        onsubmit="return RentViewSubmitOnce(); " >

              <div class="form-group  ">
                <input type="hidden" name="RentViewAdPid" value="<?php echo $vRentViewAdPid; ?>" />

<!--
                <input type="hidden" name="RentViewPixCount" value="<?php // echo $vRentViewPixCount; ?>" />
                <input type="hidden" name="RentViewPixFileNames" value="<?php // echo $vRentViewPixFileNames; ?>" />
                <input type="hidden" name="RentViewHidden" value="TRUE" />
-->

                <div class="btnbgc">
                  <input type="submit" class="btn btn-primary btn-lg btn-block"
                              name="RentViewSubmit" value="Edit this Ad."  style="color:black."  >
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

            <form class="form" id="RentDeleteForm" name="RentDeleteForm"
                        method="post" action="my-property-for-rent-ad-delete.php"
                        onsubmit="return RentDeleteSubmitOnce(); " >

              <div class="form-group  ">
                <input type="hidden" name="RentDeleteAdNum" value="<?php echo $vRentViewAdNum; ?>" />
                <input type="hidden" name="RentDeletePixCount" value="<?php echo $vRentViewPixCount; ?>" />
                <input type="hidden" name="RentDeletePixFileNames" value="<?php echo $vRentViewPixFileNames; ?>" />
                <input type="hidden" name="RentDeleteHidden" value="TRUE" />

                <div class="btnbgc">
                  <input type="submit" class="btn btn-danger btn-lg btn-block"
                              name="RentDeleteSubmit" value="Delete this Ad."  style="color:black."  >
                </div>

              </div>

            </form>

            <hr>
            <br>

<!--
            <div id="" class="btnbgc">
              <button class="btn btn-success btn-lg btn-block" onclick="window.history.back();" style="color:black.">
                  Back to Ad. List
              </button>
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
