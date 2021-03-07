<?php

include ('login-user-check.php');

if ( !isset( $_POST["RentEditPixPid"] ) ) 
{
/*
  header('Location: my-property-ad-list.php');
  exit;
*/
}

if ( isset( $_POST["RentEditPixPid"] ) ) 
{
    $_SESSION['SESSION_RentEditPixPid'] = $_POST["RentEditPixPid"];
    
    if ( isset( $_POST["RentEditPixCount"] ) ) 
    {
      $_SESSION['SESSION_RentEditPixCount'] = $_POST["RentEditPixCount"];
      $_SESSION['SESSION_RentEditPixFileNames'] = $_POST["RentEditPixFileNames"];
    }
}

if (!empty($_POST)) {
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

<title>Add or Change or Delete Photo(s) - Property for Rent Ad. <?php include ('title-tag.php'); ?></title>

  <?php 
    include ('head-tag.php');
  ?>

<script type="text/javascript">

var RentEditPixDeleteSubmitted = 0;
function RentEditPixDeleteSubmitOnce() 
{
   if(!RentEditPixDeleteSubmitted) 
   {
      RentEditPixDeleteSubmitted ++;
      document.RentEditPixDeleteForm.RentEditPixDeleteSubmit.value = 'Deleting, Please Wait...';
      $('#DeletingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

var RentEditPixAddSubmitted = 0;
function RentEditPixAddSubmitOnce() 
{
   if(!RentEditPixAddSubmitted) 
   {
      RentEditPixAddSubmitted ++;
      document.RentEditPixAddForm.RentEditPixAddSubmit.value = 'UpLoading, Please Wait...';
      $('#UpLoadingSpinModal').modal('show');
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
        
          <h2 class="text-center" >Property-for-Rent Ad. Photo(s)</h2>
          
          <hr>

              <div class="form-group ">
                <label for="">Property ID</label>
                    <div id='advdisplay' class='btn-lg'>
                      <?php echo $_SESSION['SESSION_RentEditPixPid'] ; ?>
                    </div>
              </div>
              
              <hr>

 
    <?php 
    if ( isset( $_SESSION['SESSION_RentEditPixCount'] ) ) 
    {
        $vExplodeRentEditPixFileNames = explode(" ",$_SESSION['SESSION_RentEditPixFileNames']);
    ?>

            <form class="form" id="RentEditPixDeleteForm" name="RentEditPixDeleteForm" method="post" 
                        enctype="multipart/form-data" action="my-property-for-rent-ad-pix-submit.php" 
                        onsubmit="return RentEditPixDeleteSubmitOnce(); " >

                  <label for="" class=" ">Photos / Pictures of Property</label>  
                  <br>
              <div id='' class=''>
                <?php 
                foreach ($vExplodeRentEditPixFileNames as $RentEditPixFileNamesValue)
                {
                ?>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <a href="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $RentEditPixFileNamesValue; ?>" 
                            data-lightbox="RentEditPixImageLightBox" title="<?php echo $RentEditPixFileNamesValue; ?>">
                         <img class="img-responsive img-home-portfolio" name="RentEditPixImage" 
                            alt="<?php echo $RentEditPixFileNamesValue; ?>" title="<?php echo $RentEditPixFileNamesValue; ?>" 
                            src="<?php echo 'rap/' . $_SESSION['SESSION_NKPUID'] . "/" . $RentEditPixFileNamesValue; ?>"  
                            style="display: block; margin: 9px auto;" />
                      </a>
                  </div>
                  <h5><?php echo $RentEditPixFileNamesValue; ?></h5>
                  <br>
                <?php 
                }
                ?>
              </div>
                  
              <hr>
 
              <div class="form-group  ">
                <input type="hidden" name="RentEditPixDeletePixPid" value="<?php echo $_SESSION['SESSION_RentEditPixPid']; ?>" /> 
                <input type="hidden" name="RentEditPixDeletePixCount" value="<?php echo $_SESSION['SESSION_RentEditPixCount']; ?>" /> 
                <input type="hidden" name="RentEditPixDeletePixFileNames" value="<?php echo $_SESSION['SESSION_RentEditPixFileNames']; ?>" /> 
                <input type="hidden" name="RentEditPixDeleteHidden" value="TRUE" /> 
                
                <div style="">Click "Delete Photo(s)" Button below to <br>Delete <b>ALL</b> Uploaded Photos / Pictures and to <br>Add &amp; Upload new Photos / Pictures of Property.</div>
                
                <div class="btnbgc">
                  <input type="submit" class="btn btn-danger btn-lg btn-block" 
                              name="RentEditPixDeleteSubmit" value="Delete Photo(s)"  style="color:black."  >
                </div>
                
              </div>

            </form>

    <?php 
    }
    else 
    {
    ?>

            <form class="form" id="RentEditPixAddForm" name="RentEditPixAddForm" method="post" 
                        enctype="multipart/form-data" action="my-property-for-rent-ad-pix-submit.php" 
                        onsubmit="return RentEditPixAddSubmitOnce(); " >

              <div class="form-group ">
                  <label for="" class=" ">Photos / Pictures of Property</label>  
                  <br>
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
                  <input type="hidden" name="RentEditPixAddPid" value="<?php echo $_SESSION['SESSION_RentEditPixPid']; ?>" /> 
                  <span class=" btn btn-success btn-lg btn-block" style="cursor: pointer; color:black;">Click to add Pix</span>
                  <input class="multi max-5 accept-jpg|jpeg|png|gif upload" type="file" id=""  style="cursor: pointer;" 
                              name="RentEditUploadPix[]" title="JPG or GIF or PNG Images only"  >
                  <input type="hidden" name="RentEditPixAddFlag" value="Y" >
                  </div>
              </div>

              
              <hr>
              <br>


              <div class="form-group">
                  <input type="hidden" name="RentEditPixAddHidden" value="TRUE" >
                  <div id="" class="btnbgc">
                    <input type="submit"  class="btn btn-primary btn-lg btn-block" 
                                name="RentEditPixAddSubmit"  value="Upload Photo(s)"  >
                  </div>
              </div>

            </form>

    <?php 
    }
    ?>


              <hr>
              <br>

<!--
              <div class="btnbgc">
                <button class="btn btn-warning btn-lg btn-block" onclick="window.history.back();" style="color:black">Back to View Ad.</button> 
              </div>
-->

            <div id="" class="btnbgc">
              <a class="btn btn-warning btn-lg btn-block" style="color:black"
                    href="my-property-for-rent-ad-view.php?pid=<?php echo $_SESSION['SESSION_RentEditPixPid']; ?>" >
                Back to View Ad.
              </a>
            </div>

          <br>
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


