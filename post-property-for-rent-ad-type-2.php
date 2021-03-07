<?php

// session_start();

include ('login-user-check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    include ('head-tag.php');
  ?>

<title>Post a Property-for-Rent Ad. <?php include ('title-tag.php'); ?></title>


<script type="text/javascript" >
jQuery(function($) {
      $('#RentPostBuiltSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#RentPostDepositAmt').autoNumeric('init', {vMin: '0', vMax: '99999999999', aPad: false});
      $('#RentPostRentAmt').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
  });
</script>


<style type="text/css">
label { display: inline-block; /*width: 20%;*/ }
.realperson-challenge { display: inline-block }
</style>

<script type="text/javascript">
$(function() {
	$('#defaultRealT').realperson();
});
</script>

</head>

<body>

  <?php
    include ('navbar-in.php');
  ?>

    <div class="section-colored text-center  center-block ">

        <div class="container">

            <div class="row">

                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Post Property-for-Rent Ad.</h2>

                    <hr>

                    <h3 style="font-weight:bold">Multi-Storey Apartment / Flat</h3>

                    <hr>

                    <form class="form" id="RentPostForm" name="RentPostForm" method="post"
                                enctype="multipart/form-data" action="post-property-for-rent-ad-status.php"
                                onsubmit="return RentPostSubmitOnce(); " >

                        <div class="form-group center-block">
                            <label for="">Location / Place of Property</label>
                            <div id='advdisplay' class='btn-lg ' >
                                <select id="RentPostPlace" name="RentPostPlace" class="" style="cursor:pointer" autofocus>
                                  <?php
                                    include ('places.php');
                                  ?>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group center-block">
                            <label for="">Type of User</label>
                            <div id='advdisplay' class='btn-lg ' >
                                <div class=" "  style="font-size:17px">
                                  <input type="radio" id="owner" name="RentPostUserType" value="O" style="cursor:pointer" checked="checked" >
                                  <label for="owner" style="cursor:pointer">Owner</label>
                                  <br>
                                  <input type="radio" id="agent" name="RentPostUserType" value="A" class=""  style="cursor:pointer">
                                  <label for="agent" style="cursor:pointer">Agent / Broker</label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group ">
                            <label for="">No. of Bed-Room(s)</label>
                            <div id='advdisplay' class='btn-lg ' >
                                <select id="RentPostBedroom" name="RentPostBedroom" class="" style="cursor:pointer" >
                                  <option value="1">&nbsp; 1 &nbsp;(BHK)</option>
                                  <option value="2" selected>&nbsp; 2 &nbsp;(BHK)</option>
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

                        <div class="form-group ">
                            <label for="">Built-Up Area Size</label>
                            <div class="input-group">
                                <input type="text" id="RentPostBuiltSize" name="RentPostBuiltSize"  maxlength="30" title=""
                                       class="form-control input-lg" placeholder=" Built-Up Size "  data-d-group="2"  >
                                <span class="input-group-addon">
                                  <select id="RentPostUnit" name="RentPostUnit" style="cursor:pointer" >
                                    <option value="F">Sq.Feet</option>
                                    <option value="M">Sq.Meters</option>
                                  </select>
                                  </span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group ">
                            <label for="">Security Deposit Amount</label>
                            <div class="input-group">
                              <span class="input-group-addon">$.</span>
                              <input type="text" id="RentPostDepositAmt" name="RentPostDepositAmt"  maxlength="30"  title=""
                                   class="form-control input-lg " placeholder=" Deposit Amt. "  data-d-group="2"  >
                            </div>
                        </div>

                        <hr>


                        <div class="form-group ">
                            <label for="">Rent Amount</label>
                            <div class="input-group">
                              <span class="input-group-addon">$.</span>
                              <input type="text" id="RentPostRentAmt" name="RentPostRentAmt"  maxlength="30"  title=""
                                   class="form-control input-lg " placeholder=" Rent Amt. "  data-d-group="2"  >
                            </div>
                        </div>

                        <hr>


                        <div class="form-group">
                            <label for="">Name of Contact Person</label>
                            <input type="text" id="RentPostCPName" name="RentPostCPName"  maxlength="40" title="40 chars. max."
                               class="form-control input-lg " placeholder=" Full Name * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Number(s) of Contact Person</label>
                            <input type="text" id="RentPostCPNumber" name="RentPostCPNumber" maxlength="40" title="40 chars. max."
                               class="form-control input-lg" placeholder=" Phone Number(s) * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Email-ID of Contact Person</label>
                            <input type="text" id="RentPostCPEmailid" name="RentPostCPEmailid"  maxlength="40" title="40 chars. max."
                              class="form-control input-lg" placeholder=" Email - ID * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Address of Property</label>
                            <textarea id="RentPostAddress" name="RentPostAddress" rows="3" maxlength="100" title="100 chars. max."
                              class="form-control input-lg" placeholder=" Address of Property * " required></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Title / Subject</label>
                            <input type="text" id="RentPostTitle" name="RentPostTitle"  maxlength="60"  title="60 chars. max."
                              class="form-control input-lg" placeholder=" Title / Subject * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Description / Details</label>
                            <textarea id="RentPostDescription" name="RentPostDescription" rows="10" maxlength="1000" title="1000 chars. max."
                                class="form-control input-lg" placeholder=" Description / Details * " required></textarea>
                        </div>

                        <hr>

                        <div class="form-group ">
                            <label for="" class=" ">Photos / Pictures of Property</label>  <br>
                              You can add upto <b>5</b> images to Upload.<br>

<span style="font-size:10px">
( Each file size should not exceed 2 MB )
<!--
( You may get a server error if you try to upload an image of more <br>
than 2 MB. This message in brackets is for testing purpose only.  )
-->
</span>
<br>
                              <div id="" class="fileUpload filebgc" style="">
                              <span class=" btn btn-success btn-lg btn-block" style="cursor: pointer; color:black;">Click to add images</span>
                              <input class="multi max-5 accept-jpg|jpeg|png|gif upload" type="file" id=""  style="cursor: pointer;"
                                          name="RentPostUploadPix[]" title="JPG or GIF or PNG Images only" >
                              </div>
                        </div>

                        <hr>

<!--
                        <div class="form-group">
                          <label for="" class=" ">CAPTCHA Text</label>  <br>
                            <input type="text" id="defaultRealT" name="defaultRealT"  maxlength="6"
                                title="CAPTCHA "
                                class="form-control input-lg" placeholder=" CAPTCHA Text *" required >

                            <span style="font-size:12px">Type the CAPTCHA Text displayed above.
                            <br>
                            <b>CAPTCHA = C</b>ompletely <b>A</b>utomated <b>P</b>ublic <b>T</b>uring
                                        test to tell <b>C</b>omputers and <b>H</b>umans <b>A</b>part
                            </span>
                        </div>

                        <hr>
-->

                        <br>


                        <div class="form-group">
                            <input type="hidden" name="RentPostHidden" value="TRUE" >
                            <input type="hidden" name="RentPostPropType" value="2" >
                            <div id="" class="btnbgc">
                              <input type="submit" class="btn btn-danger btn-lg btn-block"
                                          id="RentPostSubmit" name="RentPostSubmit"
                                          value="Submit to Post the Ad."  >
                            </div>
                        </div>

                    </form>

                    <hr>

                    <br>

                    <div class="btnbgc">
                      <button class="btn btn-warning btn-lg btn-block" style="color:black" onclick="window.history.back()">
                        Click to Go Back
                      </button>
                    </div>


                    <hr>

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
