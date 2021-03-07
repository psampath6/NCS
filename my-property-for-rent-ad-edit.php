<?php

include ('login-user-check.php');

$vFlagRentEdit = 0;

if ( isset( $_POST["RentViewSubmit"] ) )
{
    $_SESSION['SESSION_RentAdPid'] = $_POST["RentViewAdPid"];

}


if (!empty($_POST)) {
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}


if ( isset( $_SESSION['SESSION_RentAdPid'] ) )
{

    require_once ('dbcon.php');

    $svRentAdPid = $_SESSION['SESSION_RentAdPid'];

    $svNkpUid = $_SESSION['SESSION_NKPUID'];

    $vQueryRentEdit = "SELECT * FROM `rentads` WHERE `rapid` = '$svRentAdPid' AND `nkpuid` = '$svNkpUid' ";
    $vResultRentEdit = mysqli_query($dbc, $vQueryRentEdit);


    if($vResultRentEdit)
    {
      if(mysqli_num_rows($vResultRentEdit) == 1)
      {
        //Search Successful

        $vFetchRentEdit = mysqli_fetch_assoc($vResultRentEdit);

        $vRentEditAdNum = $vFetchRentEdit['ranum'];

        $vRentEditAdPid = $vFetchRentEdit['rapid'];

//        $vRentEditAdDate = $vFetchRentEdit['radate'];

        $vRentEditPlace = $vFetchRentEdit['place'];

        $vRentEditUserType = $vFetchRentEdit['ut'];

        $vRentEditPropType = $vFetchRentEdit['pt'];

        $vRentEditBuiltSize = $vFetchRentEdit['built'];

        $vRentEditUnit = $vFetchRentEdit['su'];

        $vRentEditBed = $vFetchRentEdit['nb'];

        $vRentEditDeposit = $vFetchRentEdit['deposit'];
        $vRentEditRentAmt = $vFetchRentEdit['rent'];

        $vRentEditCPName = $vFetchRentEdit['cname'];
        $vRentEditCPNumber = $vFetchRentEdit['cnumber'];
        $vRentEditCPEmailid = $vFetchRentEdit['cemail'];

        $vRentEditAddress = $vFetchRentEdit['address'];
        $vRentEditTitle = $vFetchRentEdit['title'];
        $vRentEditDescription = $vFetchRentEdit['description'];

        $vRentEditPixCount = $vFetchRentEdit['xc'];
        $vRentEditPixFileNames = $vFetchRentEdit['pixfilename'];

        $vFlagRentEdit = 1;


        switch ($vRentEditUserType) {
            case 'O':
                $vRentEditUserTypeDisplay = 'Owner';
                break;
            case 'B':
                $vRentEditUserTypeDisplay = 'Builder';
                break;
            case 'A':
                $vRentEditUserTypeDisplay = 'Agent/Broker';
                break;
        }

        switch ($vRentEditPropType) {
            case '1':
                $vRentEditPropTypeDisplay = 'Vacant Land / Plot / Site';
                break;
            case '2':
                $vRentEditPropTypeDisplay = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vRentEditPropTypeDisplay = 'Independent Bungalow / House / Villa';
                break;
            case '4':
                $vRentEditPropTypeDisplay = 'Commercial Building / Office-Space';
                break;
        }

        switch ($vRentEditUnit) {
            case 'F':
                $vRentEditUnitDisplay = 'Sq.Ft.';
                break;
            case 'M':
                $vRentEditUnitDisplay = 'Sq.Mtrs.';
                break;
            case 'A':
                $vRentEditUnitDisplay = 'Acres';
                break;
        }


        if ($vRentEditPixCount != '0') {
          $vExplodeRentEditPixFileNames = explode(" ",$vRentEditPixFileNames);
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

if ($vFlagRentEdit == 0)
{
header('Location: user-dashboard.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>Edit Property for Rent Ad. <?php include ('title-tag.php'); ?></title>

  <?php
    include ('head-tag.php');
  ?>

<script type="text/javascript" >
jQuery(function($) {
      $('#RentEditBuiltUpSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#RentEditDepositAmt').autoNumeric('init', {vMin: '0', vMax: '99999999999', aPad: false});
      $('#RentEditRentAmt').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
  });
</script>

<style>
#advdisplay {
}

#advdisp label {
font-weight:normal;
}
</style>


<script type="text/javascript" >


var EditRentSubmitted = 0;
function RentEditSubmitOnce()
{
   if(!EditRentSubmitted)
   {
      EditRentSubmitted ++;
      document.RentEditForm.RentEditSubmit.value = 'Updating, Please Wait...';
      $('#LoadingSpinModal').modal('show');
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

          <h2 class="text-center" >Edit Property-for-Rent Ad.</h2>

          <hr>

          <?php
          if ( ( isset( $_SESSION['SESSION_RentAdPid'] ) ) && ($vFlagRentEdit == 1) )
          {
          ?>

          <div id='advdisp' class=' btn-block btn.-default ' style='background-color: ; '>

            <form class="form" id="RentEditForm" name="RentEditForm" method="post"
                        enctype="multipart/form-data" action="my-property-for-rent-ad-edit-submit.php"
                        onsubmit="return RentEditSubmitOnce(); " >

              <div class="form-group ">
                <label for="">Property ID</label>
                    <div id='advdisplay' class='btn-lg'>
                      <?php echo $vRentEditAdPid; ?>
                    </div>
              </div>

              <hr>

              <div class="form-group ">
                <label for="">Property Type</label>
                    <div id='advdisplay' class='btn-lg'>
                      <?php echo $vRentEditPropTypeDisplay; ?>
                    </div>
                <input type="hidden" name="RentEditPropType" value="<?php echo $vRentEditPropType; ?>" >
              </div>

              <hr>

              <div class="form-group center-block">
                  <label for="">Location / Place of Property</label>
                  <div id='advdisplay' class='btn-lg ' >
                    <select id="RentEditPlace" name="RentEditPlace" class="" style="cursor:pointer" >
                      <option value="<?php echo $vRentEditPlace; ?>">&nbsp;<?php echo $vRentEditPlace; ?></option>
                      <option value="" disabled>&nbsp;----------------</option>
                      <?php
                        include ('places.php');
                      ?>
                    </select>
                  </div>
              </div>

              <hr>

              <div class="form-group ">
                  <label for="">Type of User</label>
                    <div id='advdisplay' class='btn-lg ' >
                      <select id="RentEditUserType" name="RentEditUserType" class="" style="cursor:pointer" >
                        <option value="<?php echo $vRentEditUserType; ?>">&nbsp;<?php echo $vRentEditUserTypeDisplay; ?></option>
                        <option value="" disabled>&nbsp;-----------------</option>
                        <option value="O">&nbsp;Owner</option>
                        <option value="A">&nbsp;Agent/Broker</option>
                      </select>
                  </div>
              </div>

              <hr>

              <?php
              if ($vRentEditBed != '-') {
              ?>
                <div class="form-group ">
                    <label for="">No. of Bed-Rooms</label>
                    <div id='advdisplay' class='btn-lg ' >
                      <select id="RentEditBedroom" name="RentEditBedroom" class="" style="cursor:pointer" >
                        <option value="<?php echo $vRentEditBed; ?>">&nbsp;
                            <?php if ($vRentEditBed == '+') { $vRentEditBed = '10+'; } echo $vRentEditBed.' &nbsp;(BHK)'; ?></option>
                        <option value="" disabled>&nbsp;-------------</option>
                        <option value="1">&nbsp; 1 &nbsp;(BHK)</option>
                        <option value="2">&nbsp; 2 &nbsp;(BHK)</option>
                        <option value="3">&nbsp; 3 &nbsp;(BHK)</option>
                        <option value="4">&nbsp; 4 &nbsp;(BHK)</option>
                        <option value="5">&nbsp; 5 &nbsp;(BHK)</option>
                        <option value="6">&nbsp; 6 &nbsp;(BHK)</option>
                        <option value="7">&nbsp; 7 &nbsp;(BHK)</option>
                        <option value="8">&nbsp; 8 &nbsp;(BHK)</option>
                        <option value="9">&nbsp; 9 &nbsp;(BHK)</option>
                        <option value="+">10+&nbsp;(BHK)</option>
                      </select>
                    </div>
                </div>

                <hr>
              <?php
              }
              ?>

              <?php
              if ($vRentEditBuiltSize != '-') {
              ?>

                <div class="form-group ">
                    <label for="">Built-Up Area Size</label>
                    <div class="input-group">
                        <!-- <label for=""><h4>Area Size : </h4></label> -->
                        <input type="text" id="RentEditBuiltUpSize" name="RentEditBuiltUpSize"
                                    class="form-control input-lg" placeholder=" Built-Up Size "
                                    maxlength="30" value="<?php echo str_replace(',', '', $vRentEditBuiltSize) ; ?>"
                                    title="" data-d-group="2"  />
                        <span class="input-group-addon">
                          <span style="font-size:14px;font-weight:normal;"> <?php echo $vRentEditUnitDisplay ; ?></span>
                        </span>
                    </div>
                </div>

                <hr>

                <?php
                }
                ?>

                <input type="hidden" name="RentEditUnit" value="<?php echo $vRentEditUnit; ?>" >

                <div class="form-group ">
                    <label for="">Security Deposit Amount</label>
                    <div class="input-group">
                      <span class="input-group-addon">$.</span>
                      <input type="text" id="RentEditDepositAmt" name="RentEditDepositAmt"
                                  class="form-control input-lg " placeholder=" Rate Amt. "
                                  maxlength="30"  value="<?php echo str_replace(',', '', $vRentEditDeposit) ; ?>"
                                  title="" data-d-group="2"  />
                    </div>
                </div>

                <hr>

                <div class="form-group ">
                    <label for="">Rent Amount</label>
                    <div class="input-group">
                      <span class="input-group-addon">$.</span>
                      <input type="text" id="RentEditRentAmt" name="RentEditRentAmt"
                                  class="form-control input-lg " placeholder=" Total Price "
                                  maxlength="30" value="<?php echo str_replace(',', '', $vRentEditRentAmt) ; ?>"
                                  title="" data-d-group="2"  />
                    </div>
                </div>

                <hr>


                <div class="form-group">
                    <label for="">Name of Contact Person</label>
                    <input type="text" id="RentEditCPName" name="RentEditCPName"
                                class="form-control input-lg " placeholder=" Full Name * "
                                value="<?php echo $vRentEditCPName ; ?>"
                                maxlength="40" title="40 chars. max." required />
                </div>

                <hr>


                <div class="form-group">
                    <label for="">Number(s) of Contact Person</label>
                    <input type="text" id="RentEditCPNumber" name="RentEditCPNumber"
                                class="form-control input-lg" placeholder=" Phone Number(s) * "
                                value="<?php echo $vRentEditCPNumber ; ?>"
                                maxlength="40" title="40 chars. max." required />
                </div>

                <hr>


                <div class="form-group">
                    <label for="">Email-ID of Contact Person</label>
                    <input type="text" id="RentEditCPEmailid" name="RentEditCPEmailid"
                                class="form-control input-lg" placeholder=" Email - ID * "
                                value="<?php echo $vRentEditCPEmailid ; ?>"
                                maxlength="40" title="40 chars. max." required />
                </div>

                <hr>


                <div class="form-group">
                    <label for="">Address of Property</label>
                    <textarea id="RentEditAddress" name="RentEditAddress"
                          class="form-control input-lg" placeholder=" Address of Property * "
                          rows="3" maxlength="100" title="100 chars. max."
                          required ><?php echo $vRentEditAddress ; ?></textarea>
                </div>

                <hr>

                <div class="form-group">
                    <label for="">Title / Subject</label>
                    <input type="text" id="RentEditTitle" name="RentEditTitle"
                                class="form-control input-lg" placeholder=" Title / Subject * "
                                value="<?php echo $vRentEditTitle ; ?>"
                                maxlength="60"  title="60 chars. max." required />
                </div>

                <hr>

                <div class="form-group">
                    <label for="">Description / Details</label>
                    <br/>
                    <textarea id="RentEditDescription" name="RentEditDescription"
                          class="form-control input-lg" placeholder=" Description / Details * "
                          rows="10" maxlength="1000" title="1000 chars. max."  
                          required ><?php echo $vRentEditDescription ; ?></textarea>
                </div>

<!--

                <hr>

                <?php
                if ($vRentEditPixCount != '0')
                {
                ?>
                <label>Photos / Pictures of Property</label>
                <div id='advdisplay.' class='btn-lg.'>
                <br>
                  <?php
                  foreach ($vExplodeRentEditPixFileNames as $vExplodeRentEditPixFileNamesValue)
                  {
                  ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a href="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentEditPixFileNamesValue; ?>"
                              data-lightbox="RentEditPixImageLightBox" title="<?php echo $vExplodeRentEditPixFileNamesValue; ?>">
                           <img class="img-responsive img-home-portfolio" name="RentEditPixImage"
                              alt="<?php echo $vExplodeRentEditPixFileNamesValue; ?>"
                              title="<?php echo $vExplodeRentEditPixFileNamesValue; ?>"
                              src="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentEditPixFileNamesValue; ?>"
                              style="display: block; margin: 9px auto;" />
                        </a>
                    </div>
                    <h5><?php echo $vExplodeRentEditPixFileNamesValue; ?></h5>
                    <hr>

                  <?php
                  }
                  ?>
                </div>

                <hr>

                <div class="form-group  ">
                  <input type="hidden" name="RentEditPixDeleteAdNum" value="<?php echo $vRentEditAdNum; ?>" />
                  <input type="hidden" name="RentEditPixDeletePixCount" value="<?php echo $vRentEditPixCount; ?>" />
                  <input type="hidden" name="RentEditPixDeletePixFileNames" value="<?php echo $vRentEditPixFileNames; ?>" />
                  <input type="hidden" name="RentEditPixDeleteHidden" value="TRUE" />

                  <div style="">Click below Button to Delete All Uploaded Photos / Pictures <br>and to Add &amp; Upload new Photos / Pictures of Property.</div>
                  <div class="btnbgc">
                    <input type="submit" class="btn btn-danger btn-lg btn-block"
                                name="RentEditPixDeleteSubmit" value="Delete all image(s)"  style="color:black."
                                onclick = "$('#DeletingSpinModal').modal('show')" >
                  </div>
                </div>

                <?php
                }
                else
                {
                ?>

                <div class="form-group ">
                    <label for="" class=" ">: Photos / Pictures of Property :</label>  <br>
                      You can add upto <b>5</b> images to Upload.<br>

<span style="font-size:10px">
( File size should not exceed 2 MB )
</span>
<br>
                      <div id="" class="fileUpload filebgc" style="">
                      <span class=" btn btn-success btn-lg btn-block" style="cursor: pointer; color:black;">Click to add images</span>
                      <input type="file" class="multi max-5 accept-jpg|jpeg|png|gif upload"
                                  id="" name="RentEditUploadPix[]"  style="cursor: pointer;"
                                  title="JPG or GIF or PNG Images only"  >
                      <input type="hidden" name="FlagPixRentEdit" value="Y" >
                      </div>
                </div>

                <hr>

                <?php
                }
                ?>
-->

<!--
              <div class="form-group">
                <div id="spin"></div>
              </div>
-->

              <hr>
              <hr>

              <div class="form-group">
                  <input type="hidden" name="RentEditHidden" value="TRUE" >
                  <div id="" class="btnbgc">
                    <input type="submit" class="btn btn-primary btn-lg btn-block"
                                name="RentEditSubmit"  value="Submit to Edit the Ad."  >
                  </div>
              </div>

            </form>

            <hr>
            <hr>

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
