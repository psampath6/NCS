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

<title>Post a Property-for-Sale Ad. <?php include ('title-tag.php'); ?></title>

<script type="text/javascript" >
jQuery(function($) {
      $('#SalePostBuiltSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SalePostLandSize').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SalePostRate').autoNumeric('init', {vMin: '0', vMax: '999999999', aPad: false});
      $('#SalePostPrice').autoNumeric('init', {vMin: '0', vMax: '999999999999', aPad: false});
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

            <div class="row ">
                <div class="col-md-6 col-md-offset-3 " >

                    <h2 class="text-center" >Post Property-for-Sale Ad.</h2>

                    <hr>

                    <h3 style="font-weight:bold">Commercial Building / Office-Space</h3>

                    <hr>

                    <form class="form" id="SalePostForm" name="SalePostForm" method="post"
                                enctype="multipart/form-data" action="post-property-for-sale-ad-status.php"
                                onsubmit="return SalePostSubmitOnce(); " >

                        <div class="form-group center-block">
                            <label for="">Location / Place of Property</label>
                            <div id='advdisplay' class='btn-lg ' >
                              <select id="SalePostPlace" name="SalePostPlace" class="" style="cursor:pointer" autofocus>
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
                            <div class="text-left."  style="font-size:17px">
                              <input type="radio" id="owner" name="SalePostUserType" value="O" style="cursor:pointer" checked="checked"  >
                              <label for="owner" style="cursor:pointer">Owner</label>
                               &nbsp;|&nbsp;
                              <input type="radio" id="builder" name="SalePostUserType" value="B" class="" style="cursor:pointer" >
                              <label for="builder" style="cursor:pointer">Builder</label>
                              <br>
                              <input type="radio" id="agent" name="SalePostUserType" value="A" class="" style="cursor:pointer" >
                              <label for="agent" style="cursor:pointer">Agent / Broker</label>
                            </div>
                          </div>
                        </div>

                        <hr>

                        <div class="form-group ">
                            <label for="">Built-Up Area Size</label>
                            <div class="input-group">
                                <input type="text" id="SalePostBuiltSize" name="SalePostBuiltSize" maxlength="30" title=""
                                       class="form-control input-lg" placeholder=" Built-Up Size "  data-d-group="2"  >
                                <span class="input-group-addon">
                                <select id="SalePostUnit" name="SalePostUnit" style="cursor:pointer" >
                                  <option value="Sq.Ft.">Sq.Feet</option>
                                  <option value="Sq.Mtr.">Sq.Meters</option>
                                  <option value="Acre">Acres</option>
                                </select>
                                </span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Land Area Size</label>
                            <div class="input-group">
                                <input type="text" id="SalePostLandSize" name="SalePostLandSize" maxlength="30" title=""
                                       class="form-control input-lg" placeholder=" Land Size "   data-d-group="2" >
                                <span class="input-group-addon"> <span id="SalePostUnitLandDisplay"></span>
                                </span>
                            </div>
                        </div>

                        <hr>

                        <div class="form-group ">
                            <label for="">Rate of Property</label>
                            <div class="input-group">
                              <input type="text" id="SalePostRate" name="SalePostRate" maxlength="30"  title=""
                                   class="form-control input-lg " placeholder=" Rate "  data-d-group="2"  >
                              <span class="input-group-addon">$. Per
                                <span id="SalePostUnitRateDisplay"></span>
                              </span>
                            </div>
                        </div>

                        <script>
                        function displayvals() {
                          var singlevalue = $( "#SalePostUnit" ).val();
                          $( "span#SalePostUnitRateDisplay" ).html( singlevalue );
                          var singlevalues = $( "#SalePostUnit option:selected" ).text();
                          $( "span#SalePostUnitLandDisplay" ).html( singlevalues );
                        }
                        $( "select" ).change( displayvals );
                        displayvals();
                        </script>

                        <hr>

                        <div class="form-group ">
                            <label for="">Total Price of Property</label>
                            <div class="input-group">
                              <span class="input-group-addon">$.</span>
                              <input type="text" id="SalePostPrice" name="SalePostPrice" maxlength="30"  title=""
                                   class="form-control input-lg " placeholder=" Total Price "  data-d-group="2"  >
                            </div>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Name of Contact Person</label>
                            <input type="text" id="SalePostCPName" name="SalePostCPName" maxlength="40" title="40 chars. max."
                                   class="form-control input-lg " placeholder=" Full Name * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Number(s) of Contact Person</label>
                            <input type="text" id="SalePostCPNumber" name="SalePostCPNumber"  maxlength="40" title="40 chars. max."
                                   class="form-control input-lg" placeholder=" Phone Number(s) * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Email-ID of Contact Person</label>
                            <input type="text" id="SalePostCPEmailid" name="SalePostCPEmailid"  maxlength="40" title="40 chars. max."
                                   class="form-control input-lg" placeholder=" Email - ID * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Address of Property</label>
                            <textarea id="SalePostAddress" name="SalePostAddress" rows="3"  maxlength="100" title="100 chars. max."
                                              class="form-control input-lg" placeholder=" Address of Property * " required></textarea>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Title / Subject</label>
                            <input type="text" id="SalePostTitle" name="SalePostTitle"  maxlength="60"  title="60 chars. max."
                                   class="form-control input-lg" placeholder=" Title / Subject * "  required>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="">Description / Details</label>
                            <br/>
                            <textarea id="SalePostDescription" name="SalePostDescription" rows="10" maxlength="1000" title="1000 chars. max."
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
                              <span class=" btn btn-info btn-lg btn-block" style="cursor: pointer; color:black;">Click to add images</span>
                              <input class="multi max-5 accept-jpg|jpeg|png|gif upload" type="file" id=""  style="cursor: pointer;"
                                          name="SalePostUploadPix[]" title="JPG or GIF or PNG Images only" >
                              </div>
                        </div>

                        <hr>

<!--
                            <div id="spin"></div>
-->


<!--
                        <div class="form-group">
                          <label for="" class=" ">CAPTCHA Text</label>  <br>
                            <input type="text" id="defaultRealT" name="defaultRealT"  maxlength="6" title="CAPTCHA"
                                class="form-control input-lg" placeholder=" CAPTCHA Text * " required >

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
                            <input type="hidden" name="SalePostHidden" value="TRUE" >
                            <input type="hidden" name="SalePostPropType" value="4" >
                            <div id="" class="btnbgc">
                              <input type="submit" class="btn btn-primary btn-lg btn-block"
                                          id="SalePostSubmit"  name="SalePostSubmit"
                                          value="Submit to Post the Ad."  >
                            </div>
                        </div>

                    </form>

                    <hr>
                    <br>

                    <div class="btnbgc">
                      <button class="btn btn-warning btn-lg btn-block" style="color:black" onclick="window.history.back()">
                        Click to Go Back.
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
