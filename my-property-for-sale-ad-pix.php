<?php

include ('login-user-check.php');

if ( !isset( $_POST["SaleEditPixPid"] ) ) 
{
/*
  header('Location: my-property-ad-list.php');
  exit;
*/
}

if ( isset( $_POST["SaleEditPixPid"] ) ) 
{
    $_SESSION['SESSION_SaleEditPixPid'] = $_POST["SaleEditPixPid"];
    
    if ( isset( $_POST["SaleEditPixCount"] ) ) 
    {
      $_SESSION['SESSION_SaleEditPixCount'] = $_POST["SaleEditPixCount"];
      $_SESSION['SESSION_SaleEditPixFileNames'] = $_POST["SaleEditPixFileNames"];
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

<title>Add or Change or Delete Photo(s) - Property for Sale Ad. <?php include ('title-tag.php'); ?></title>

  <?php 
    include ('head-tag.php');
  ?>

<script type="text/javascript">

var SaleEditPixDeleteSubmitted = 0;
function SaleEditPixDeleteSubmitOnce() 
{
   if(!SaleEditPixDeleteSubmitted) 
   {
      SaleEditPixDeleteSubmitted ++;
      document.SaleEditPixDeleteForm.SaleEditPixDeleteSubmit.value = 'Deleting, Please Wait...';
      $('#DeletingSpinModal').modal('show');
      SpinStart();
      return true;
   }
   else {
      return false;
   }
}

var SaleEditPixAddSubmitted = 0;
function SaleEditPixAddSubmitOnce() 
{
   if(!SaleEditPixAddSubmitted) 
   {
      SaleEditPixAddSubmitted ++;
      document.SaleEditPixAddForm.SaleEditPixAddSubmit.value = 'UpLoading, Please Wait...';
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
        
          <h2 class="text-center" >Property-for-Sale Ad. Photo(s)</h2>
          
          <hr>

              <div class="form-group ">
                <label for="">Property ID</label>
                    <div id='advdisplay' class='btn-lg'>
                      <?php echo $_SESSION['SESSION_SaleEditPixPid'] ; ?>
                    </div>
              </div>
              
              <hr>

 
    <?php 
    if ( isset( $_SESSION['SESSION_SaleEditPixCount'] ) ) 
    {
        $vExplodeSaleEditPixFileNames = explode(" ",$_SESSION['SESSION_SaleEditPixFileNames']);
    ?>

            <form class="form" id="SaleEditPixDeleteForm" name="SaleEditPixDeleteForm" method="post" 
                        enctype="multipart/form-data" action="my-property-for-sale-ad-pix-submit.php" 
                        onsubmit="return SaleEditPixDeleteSubmitOnce(); " >

                  <label for="" class=" ">Photos / Pictures of Property</label>  
                  <br>
              <div id='' class=''>
                <?php 
                foreach ($vExplodeSaleEditPixFileNames as $SaleEditPixFileNamesValue)
                {
                ?>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <a href="<?php echo 'saleadpix/' . $_SESSION['SESSION_NKPUID'] . "/" . $SaleEditPixFileNamesValue; ?>" 
                            data-lightbox="SaleEditPixImageLightBox" title="<?php echo $SaleEditPixFileNamesValue; ?>">
                         <img class="img-responsive img-home-portfolio" name="SaleEditPixImage" 
                            alt="<?php echo $SaleEditPixFileNamesValue; ?>" title="<?php echo $SaleEditPixFileNamesValue; ?>" 
                            src="<?php echo 'saleadpix/' . $_SESSION['SESSION_NKPUID'] . "/" . $SaleEditPixFileNamesValue; ?>"  
                            style="display: block; margin: 9px auto;" />
                      </a>
                  </div>
                  <h5><?php echo $SaleEditPixFileNamesValue; ?></h5>
                  <br>
                <?php 
                }
                ?>
              </div>
                  
              <hr>
 
              <div class="form-group  ">
                <input type="hidden" name="SaleEditPixDeletePixPid" value="<?php echo $_SESSION['SESSION_SaleEditPixPid']; ?>" /> 
                <input type="hidden" name="SaleEditPixDeletePixCount" value="<?php echo $_SESSION['SESSION_SaleEditPixCount']; ?>" /> 
                <input type="hidden" name="SaleEditPixDeletePixFileNames" value="<?php echo $_SESSION['SESSION_SaleEditPixFileNames']; ?>" /> 
                <input type="hidden" name="SaleEditPixDeleteHidden" value="TRUE" /> 

                <div style="">Click "Delete Photo(s)" Button below to <br>Delete <b>ALL</b> Uploaded Photos / Pictures and to <br>Add &amp; Upload new Photos / Pictures of Property.</div>
                
                <div class="btnbgc">
                  <input type="submit" class="btn btn-danger btn-lg btn-block" 
                              name="SaleEditPixDeleteSubmit" value="Delete Photo(s)"  style="color:black."  >
                </div>
                
              </div>

            </form>

    <?php 
    }
    else 
    {
    ?>

            <form class="form" id="SaleEditPixAddForm" name="SaleEditPixAddForm" method="post" 
                        enctype="multipart/form-data" action="my-property-for-sale-ad-pix-submit.php" 
                        onsubmit="return SaleEditPixAddSubmitOnce(); " >

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
                  <input type="hidden" name="SaleEditPixAddPid" value="<?php echo $_SESSION['SESSION_SaleEditPixPid']; ?>" /> 
                  <span class=" btn btn-success btn-lg btn-block" style="cursor: pointer; color:black;">Click to add Photo</span>
                  <input class="multi max-5 accept-jpg|jpeg|png|gif upload" type="file" id=""  style="cursor: pointer;" 
                              name="SaleEditUploadPix[]" title="JPG or GIF or PNG Images only"  >
                  <input type="hidden" name="SaleEditPixAddFlag" value="Y" >
                  </div>
              </div>

              
              <hr>
              <br>


              <div class="form-group">
                  <input type="hidden" name="SaleEditPixAddHidden" value="TRUE" >
                  <div id="" class="btnbgc">
                    <input type="submit"  class="btn btn-primary btn-lg btn-block" 
                                name="SaleEditPixAddSubmit"  value="Upload Photo(s)"  >
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
                    href="my-property-for-sale-ad-view.php?pid=<?php echo $_SESSION['SESSION_SaleEditPixPid']; ?>" >
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


