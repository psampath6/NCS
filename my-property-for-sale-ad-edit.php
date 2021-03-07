<?php

include ('login-user-check.php');

$vFlagSaleEdit = 0;

if ( isset( $_POST["SaleViewSubmit"] ) )
{
    $_SESSION['SESSION_SaleAdPid'] = $_POST["SaleViewAdPid"];

}


if (!empty($_POST)) {
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}


if ( isset( $_SESSION['SESSION_SaleAdPid'] ) )
{

    require_once ('dbcon.php');

    $svSaleAdPid = $_SESSION['SESSION_SaleAdPid'];

    $svNkpUid = $_SESSION['SESSION_NKPUID'];

    $vQuerySaleEdit = "SELECT * FROM `saleads` WHERE `sapid` = '$svSaleAdPid' AND `nkpuid` = '$svNkpUid' ";
    $vResultSaleEdit = mysqli_query($dbc, $vQuerySaleEdit);


    if($vResultSaleEdit)
    {
      if(mysqli_num_rows($vResultSaleEdit) == 1)
      {
        //Search Successful

        $vFetchSaleEdit = mysqli_fetch_assoc($vResultSaleEdit);

        $vSaleEditAdNum = $vFetchSaleEdit['sanum'];

        $vSaleEditAdPid = $vFetchSaleEdit['sapid'];

//        $vSaleEditAdDate = $vFetchSaleEdit['sadate'];

        $vSaleEditPlace = $vFetchSaleEdit['place'];

        $vSaleEditUserType = $vFetchSaleEdit['ut'];

        $vSaleEditPropType = $vFetchSaleEdit['pt'];

        $vSaleEditBuiltSize = $vFetchSaleEdit['built'];
        $vSaleEditLandSize = $vFetchSaleEdit['land'];

        $vSaleEditUnit = $vFetchSaleEdit['su'];

        $vSaleEditBed = $vFetchSaleEdit['nb'];

        $vSaleEditRate = $vFetchSaleEdit['rate'];
        $vSaleEditPrice = $vFetchSaleEdit['price'];

        $vSaleEditCPName = $vFetchSaleEdit['cname'];
        $vSaleEditCPNumber = $vFetchSaleEdit['cnumber'];
        $vSaleEditCPEmailid = $vFetchSaleEdit['cemail'];

        $vSaleEditAddress = $vFetchSaleEdit['address'];
        $vSaleEditTitle = $vFetchSaleEdit['title'];
        $vSaleEditDescription = $vFetchSaleEdit['description'];

        $vSaleEditPixCount = $vFetchSaleEdit['xc'];
        $vSaleEditPixFileNames = $vFetchSaleEdit['pixfilename'];

        $vFlagSaleEdit = 1;


        switch ($vSaleEditUserType) {
            case 'O':
                $vSaleEditUserTypeDisplay = 'Owner';
                break;
            case 'B':
                $vSaleEditUserTypeDisplay = 'Builder';
                break;
            case 'A':
                $vSaleEditUserTypeDisplay = 'Agent/Broker';
                break;
        }

        switch ($vSaleEditPropType) {
            case '1':
                $vSaleEditPropTypeDisplay = 'Vacant Land / Plot / Site';
                break;
            case '2':
                $vSaleEditPropTypeDisplay = 'Multi-Storey Apartment / Flat';
                break;
            case '3':
                $vSaleEditPropTypeDisplay = 'Independent Bungalow / House / Villa';
                break;
            case '4':
                $vSaleEditPropTypeDisplay = 'Commercial Building / Office Space';
                break;
        }

        switch ($vSaleEditUnit) {
            case 'F':
                $vSaleEditUnitDisplay = 'Sq.Ft.';
                break;
            case 'M':
                $vSaleEditUnitDisplay = 'Sq.Mtrs.';
                break;
            case 'A':
                $vSaleEditUnitDisplay = 'Acres';
                break;
        }


        if ($vSaleEditPixCount != '0') {
          $vExplodeSaleEditPixFileNames = explode(" ",$vSaleEditPixFileNames);
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

if ($vFlagSaleEdit == 0)
{
header('Location: user-dashboard.php');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<title>Edit Property for Sale Ad. <?php include ('title-tag.php'); ?></title>

<head>

  <?php
    include ('head-tag.php');
  ?>

<script type="text/javascript" >
jQuery(function($) {
      $('#SaleEditBuiltSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SaleEditLandSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SaleEditRate').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SaleEditPrice').autoNumeric('init', {vMin: '0', vMax: '999999999999', aPad: false});
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

var EditSaleSubmitted = 0;
function SaleEditSubmitOnce()
{
   if(!EditSaleSubmitted)
   {
      EditSaleSubmitted ++;
      document.SaleEditForm.SaleEditSubmit.value = 'Updating, Please Wait...';
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

          <h2 class="text-center" >Edit Property-for-Sale Ad.</h2>

          <hr>

          <?php
          if ( ( isset( $_SESSION['SESSION_SaleAdPid'] ) ) && ($vFlagSaleEdit == 1) )
          {
          ?>

          <div id='advdisp' class=' btn-block btn.-default ' style='background-color: ; '>

            <form class="form" id="SaleEditForm" name="SaleEditForm" method="post"
                        enctype="multipart/form-data" action="my-property-for-sale-ad-edit-submit.php"
                        onsubmit="return SaleEditSubmitOnce(); " >

              <div class="form-group ">
                <label for="">Property ID</label>
                    <div id='advdisplay' class='btn-lg'>
                      <?php echo $vSaleEditAdPid; ?>
                    </div>
              </div>

              <hr>

              <div class="form-group ">
                <label for="">Property Type</label>
                    <div id='advdisplay' class='btn-lg ' >
                      <?php echo $vSaleEditPropTypeDisplay; ?>
                    </div>
                <input type="hidden" name="SaleEditPropType" value="<?php echo $vSaleEditPropType; ?>" >
              </div>

              <hr>

              <div class="form-group center-block">
                  <label for="">Location of Property</label>
                  <div id='advdisplay' class='btn-lg ' >
                    <select id="SaleEditPlace" name="SaleEditPlace" class="" style="cursor:pointer" >
                      <option value="<?php echo $vSaleEditPlace; ?>">&nbsp;<?php echo $vSaleEditPlace; ?></option>
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
                    <select id="SaleEditUserType" name="SaleEditUserType" class="" style="cursor:pointer" >
                      <option value="<?php echo $vSaleEditUserType; ?>">&nbsp;<?php echo $vSaleEditUserTypeDisplay; ?></option>
                      <option value="" disabled>&nbsp;-----------------</option>
                      <option value="O">&nbsp;Owner</option>
                      <option value="B">&nbsp;Builder</option>
                      <option value="A">&nbsp;Agent/Broker</option>
                    </select>
                  </div>
              </div>

              <hr>

              <?php
              if ($vSaleEditBed != '-') {
              ?>
                <div class="form-group ">
                    <label for="">No. of Bed-Rooms</label>
                    <div id='advdisplay' class='btn-lg ' >
                      <select id="SaleEditBedroom" name="SaleEditBedroom" class="" style="cursor:pointer" >
                        <option value="<?php echo $vSaleEditBed; ?>">&nbsp;
                            <?php if ($vSaleEditBed == '+') { $vSaleEditBed = '10+'; } echo $vSaleEditBed.' &nbsp;(BHK)'; ?></option>
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
              if ($vSaleEditBuiltSize != '-') {
              ?>

                <div class="form-group ">
                    <label for="">Built-Up Area Size</label>
                    <div class="input-group">
                        <input type="text" id="SaleEditBuiltSize" name="SaleEditBuiltSize"
                                    class="form-control input-lg" placeholder=" Built-Up Size "
                                    maxlength="30" value="<?php echo str_replace(',', '', $vSaleEditBuiltSize); ?>"
                                    data-d-group="2" title=""   />
                        <span class="input-group-addon">
                            <span style="font-size:14px;font-weight:normal;">
                              <?php echo $vSaleEditUnitDisplay ; ?>
                            </span>
                        </span>
                    </div>
                </div>

                <hr>
              <?php
              }
              ?>

              <?php
              if ($vSaleEditLandSize != '-') {
              ?>
                <div class="form-group">
                    <label for="">Land Area Size</label>
                    <div class="input-group">
                        <input type="text" id="SaleEditLandSize" name="SaleEditLandSize"
                                    class="form-control input-lg" placeholder=" Land Size "
                                    maxlength="30" value="<?php echo str_replace(',', '', $vSaleEditLandSize);  ?>"
                                    data-d-group="2" title="" >
                        <span class="input-group-addon">
                          <span style="font-size:14px;font-weight:normal;">
                              <?php echo $vSaleEditUnitDisplay ; ?>
                          </span>
                        </span>
                    </div>
                </div>

                <hr>
              <?php
              }
              ?>

              <input type="hidden" name="SaleEditUnit" value="<?php echo $vSaleEditUnit; ?>" >

              <div class="form-group ">
                  <label for="">Rate of Property</label>
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" id="SaleEditRate" name="SaleEditRate"
                                class="form-control input-lg " placeholder=" Rate "
                                maxlength="30" value="<?php echo str_replace(',', '', $vSaleEditRate); ?>"
                                data-d-group="2" title=""  />
                    <span class="input-group-addon">
                      Per <?php echo $vSaleEditUnitDisplay; ?>
                    </span>
                  </div>
              </div>

              <hr>


              <div class="form-group ">
                  <label for="">Total Price of Property</label>
                  <div class="input-group">
                    <span class="input-group-addon">$.</span>
                    <input type="text" id="SaleEditPrice" name="SaleEditPrice"
                                class="form-control input-lg " placeholder=" Total Price "
                                maxlength="30" value="<?php echo str_replace(',', '', $vSaleEditPrice) ; ?>"
                                data-d-group="2" title=""  />
                  </div>
              </div>

              <hr>


              <div class="form-group">
                  <label for="">Name of Contact Person</label>
                  <input type="text" id="SaleEditCPName" name="SaleEditCPName"
                              class="form-control input-lg " placeholder=" Full Name * "
                              maxlength="40" title="40 chars. max." 
                              value="<?php echo $vSaleEditCPName ; ?>"  required />
              </div>

              <hr>


              <div class="form-group">
                  <label for="">Number(s) of Contact Person</label>
                  <input type="text" id="SaleEditCPNumber" name="SaleEditCPNumber"
                              class="form-control input-lg" placeholder=" Phone Number(s) * "
                              maxlength="40" title="40 chars. max."
                              value="<?php echo $vSaleEditCPNumber ; ?>" required />
              </div>

              <hr>


              <div class="form-group">
                  <label for="">Email-ID of Contact Person</label>
                  <input type="text" id="SaleEditCPEmailid" name="SaleEditCPEmailid"
                              class="form-control input-lg" placeholder=" Email - ID * "
                              maxlength="40" title="40 chars. max."
                              value="<?php echo $vSaleEditCPEmailid ; ?>"  required />
              </div>

              <hr>


              <div class="form-group">
                  <label for="">Address of Property</label>
                  <textarea id="SaleEditAddress" name="SaleEditAddress"
                                    class="form-control input-lg" placeholder=" Address of Property * "
                                    rows="3" maxlength="100" title="100 chars. max."
                                    required ><?php echo $vSaleEditAddress; ?></textarea>
              </div>

              <hr>

              <div class="form-group">
                  <label for="">Title / Subject</label>
                  <input type="text" id="SaleEditTitle" name="SaleEditTitle"
                              class="form-control input-lg" placeholder=" Title / Subject * "
                              maxlength="60"  title="60 chars. max."
                              value="<?php echo $vSaleEditTitle ; ?>"  required />
              </div>

              <hr>


              <div class="form-group">
                  <label for="">Description / Details</label>
                  <br/>
                  <textarea id="SaleEditDescription" name="SaleEditDescription"
                                    class="form-control input-lg" placeholder=" Description / Details * "
                                    rows="10" maxlength="1000" title="1000 chars. max."
                                    required ><?php echo $vSaleEditDescription; ?></textarea>
              </div>

<!--
              <hr>
              <hr>

              <?php
              if ($vSaleEditPixCount != '0')
              {
              ?>
                <label>Photos / Pictures of Property</label>
                <div id='advdisplay.' class='btn-lg.'>

                <?php
                foreach ($vExplodeSaleEditPixFileNames as $vExplodeSaleEditPixFileNamesValue)
                {
                ?>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <a href="<?php echo 'sap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleEditPixFileNamesValue; ?>"
                            data-lightbox="SaleEditPixImageLightBox" title="<?php echo $vExplodeSaleEditPixFileNamesValue; ?>">
                         <img class="img-responsive img-home-portfolio" name="SaleEditPixImage"
                            alt="<?php echo $vExplodeSaleEditPixFileNamesValue; ?>" title="<?php echo $vExplodeSaleEditPixFileNamesValue; ?>"
                            src="<?php echo 'sap/' . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleEditPixFileNamesValue; ?>"
                            style="display: block; margin: 9px auto;" />
                      </a>
                  </div>
                  <h5><?php echo $vExplodeSaleEditPixFileNamesValue; ?></h5>
                  <hr>

                <?php
                }
                ?>
              </div>

              <hr>

              <div class="form-group  ">
                <input type="hidden" name="SaleEditPixDeleteAdNum" value="<?php echo $vSaleEditAdNum; ?>" />
                <input type="hidden" name="SaleEditPixDeletePixCount" value="<?php echo $vSaleEditPixCount; ?>" />
                <input type="hidden" name="SaleEditPixDeletePixFileNames" value="<?php echo $vSaleEditPixFileNames; ?>" />
                <input type="hidden" name="SaleEditPixDeleteHidden" value="TRUE" />

                <div style="">Click below Button to Delete All Uploaded Photos / Pictures <br>and to Add &amp; Upload new Photos / Pictures of Property.</div>
                <div class="btnbgc">
                  <input type="submit" class="btn btn-danger btn-lg btn-block"
                              name="SaleEditPixDeleteSubmit" value="Delete all images"  style="color:black."
                              onclick = "$('#DeletingSpinModal').modal('show')" >
                </div>
              </div>

              <?php
              }
              else
              {
              ?>

              <div class="form-group ">
                  <label for="" class=" ">Photos / Pictures of Property</label>  <br>
                    You can add upto <b>5</b> images to Upload.<br>

<span style="font-size:10px">
( File size should not exceed 2 MB )
</span>
<br>
                  <div id="" class="fileUpload filebgc" style="">
                  <span class=" btn btn-success btn-lg btn-block" style="cursor: pointer; color:black;">Click to add images</span>
                  <input class="multi max-5 accept-jpg|jpeg|png|gif upload" type="file" id=""  style="cursor: pointer;"
                              name="SaleEditUploadPix[]" title="JPG or GIF or PNG Images only"  >
                  <input type="hidden" name="FlagPixSaleEdit" value="Y" >
                  </div>
              </div>

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
                  <input type="hidden" name="SaleEditHidden" value="TRUE" >
                  <div id="" class="btnbgc">
                    <input type="submit"  class="btn btn-primary btn-lg btn-block"
                                name="SaleEditSubmit"  value="Submit to Update Ad." >
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
