<?php 
//  session_start();

 include ('login-user-check.php');

if ( (isset($_POST['SaleEditPixDeleteSubmit'])) && ($_POST['SaleEditPixDeleteHidden'] == 'TRUE') )
{

  $vSaleEditPixDeletePixPid = $_POST['SaleEditPixDeletePixPid'];
  $vSaleEditPixDeletePixCount = $_POST['SaleEditPixDeletePixCount'];
  $vSaleEditPixDeletePixFileNames = $_POST['SaleEditPixDeletePixFileNames'];

  
  if ($vSaleEditPixDeletePixCount != '0') 
  {
    $vExplodeSaleEditPixDeletePixFileNames = explode(" ",$vSaleEditPixDeletePixFileNames);  
    foreach ($vExplodeSaleEditPixDeletePixFileNames as $vExplodeSaleEditPixDeletePixFileNamesValue)
    {
      $vDeleteFromFolderSaleEditPixDelete = "saleadpix/" . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeSaleEditPixDeletePixFileNamesValue ; 
      unlink($vDeleteFromFolderSaleEditPixDelete);
    }
  }

  require_once ('dbcon.php');
  
  $vQuerySaleEditPixUpdate = "UPDATE `saleads` SET `xc` = '0' , `pixfilename` = '' WHERE `sapid` = '$vSaleEditPixDeletePixPid' "; 

  mysqli_query($dbc, $vQuerySaleEditPixUpdate);

  mysqli_close($dbc);


  unset($_SESSION['SESSION_SaleEditPixCount']);
  unset($_SESSION['SESSION_SaleEditPixFileNames']);

  
  header("Location: my-property-for-sale-ad-pix.php");
  exit();

}



if ( (isset($_POST['SaleEditPixAddSubmit'])) && ($_POST['SaleEditPixAddHidden'] == 'TRUE') )
{


define("MAX_IMG_SIZE", 2000000);  // 5242880

// define("MAX_UPLD_W", 800);  // 1024
// define("MAX_UPLD_H", 600);  //   768 

define("MAX_UPLD_W", 1024);  //  800
define("MAX_UPLD_H", 768);    //  600

ini_set('max_execution_time', 300);  // 300 seconds = 5 minutes
// set_time_limit(0);  // The maximum execution time, in seconds. If set to zero, no time limit is imposed. 

  $vFlagSaleEditPixStatus = 1;
  
  $vFlagSaleEditPixStatusErrMsg = '';


  if ( isset($_FILES['SaleEditUploadPix']) )  
  {

     function reArrayFiles(&$file_post) 
      {
          $file_ary = array();
          $file_count = count($file_post['name']);
          $file_keys = array_keys($file_post);
          for ($i=0; $i<$file_count; $i++) 
          {
            foreach ($file_keys as $key) 
            {
              $file_ary[$i][$key] = $file_post[$key][$i];
            }
          }
          return $file_ary;
      }

    if(count($_FILES['SaleEditUploadPix'])) 
    {

      $vSaleEditPixNumber = 0 ;

      $vArraySaleEditPixFileNames = array();

      $file_ary = reArrayFiles($_FILES['SaleEditUploadPix']);
      
      foreach ($file_ary as $vSaleEditForEachFile)
      {
         
        if ($vSaleEditForEachFile['error'] != 4)
        {
          
          if ($vSaleEditForEachFile['error'] > 0)
            {
                $vFlagSaleEditPixStatus = 0;
                
                switch ($vSaleEditForEachFile['error']) 
                {
                    case 1:
                        $vFlagSaleEditPixStatusErrMsg = "The uploaded file(s) exceeds 2 MB (max_upload_filesize supported by the server)" ;
                        break;
                    case 2:
                        $vFlagSaleEditPixStatusErrMsg = "The uploaded file(s) exceeds 2 MB (MAX_FILE_SIZE)" ;
                        break;
                    case 3:
                        $vFlagSaleEditPixStatusErrMsg = "The uploaded file(s) was only partially uploaded." ;
                        break;
                    default:
                        $vFlagSaleEditPixStatusErrMsg = "An error occurred when uploading the Property Photo." ;
                        break;
                }
                // die('An error occurred when uploading.');
            }
          else
            {
              if (!getimagesize($vSaleEditForEachFile['tmp_name']))
                {
                    $vFlagSaleEditPixStatus = 0;
                    $vFlagSaleEditPixStatusErrMsg = "The uploaded file does not seem to be an image file ...";
                    // die('Please ensure you are uploading an image.');
                }
              else
                {
                  if ($vSaleEditForEachFile['size'] > MAX_IMG_SIZE)
                    {
                        $vFlagSaleEditPixStatus = 0;
                        $vFlagSaleEditPixStatusErrMsg = "The uploaded File(s) exceeds maximum upload size limit of 2 MB";
                      //die('File uploaded exceeds maximum upload size of 2 MB.');
                    }
                  else
                    {
                      if  (  ($vSaleEditForEachFile['type'] != "image/png")
                        && ($vSaleEditForEachFile['type'] != "image/x-png")
                        && ($vSaleEditForEachFile['type'] != "image/jpeg")
                        && ($vSaleEditForEachFile['type'] != "image/jpg")
                        && ($vSaleEditForEachFile['type'] != "image/pjpeg")
                        && ($vSaleEditForEachFile['type'] != "image/gif") )
                        {
                            $vFlagSaleEditPixStatus = 0;
                            $vFlagSaleEditPixStatusErrMsg = "Only image files ( .GIF / .JPG / .JPEG / .PNG images ) are allowed to upload.";
                            //die('U can not upload an unsupported file-type. Only image files like .PNG / .JPG / .JPEG / .GIF are allowed...');
                        }
                    }
                }
            }
        }
        
        $valwdextns = array("gif", "jpeg", "jpg", "png");
        $vtemp = explode(".", $vSaleEditForEachFile['name']);
        $vextension = end($vtemp);


        if ((($vSaleEditForEachFile['type'] == "image/gif")
          || ($vSaleEditForEachFile['type'] == "image/jpeg")
          || ($vSaleEditForEachFile['type'] == "image/jpg")
          || ($vSaleEditForEachFile['type'] == "image/pjpeg")
          || ($vSaleEditForEachFile['type'] == "image/x-png")
          || ($vSaleEditForEachFile['type'] == "image/png"))
          && ($vSaleEditForEachFile['size'] < MAX_IMG_SIZE)
          && in_array($vextension, $valwdextns))
          {

           
            $vPath = $vSaleEditForEachFile['name'];
            $vExtn = pathinfo($vPath, PATHINFO_EXTENSION);
            $vExtn = strtolower($vExtn);

            $vSaleEditPixNumber = $vSaleEditPixNumber + 1 ;

            date_default_timezone_set('America/Los_Angeles');
            
            // $vSaleEditForEachFile['name'] = 'S_D' . date('Ymd') . '_T' . date('His') . '_M' . substr(microtime(), 2,4) . '_A' . $_SESSION['SESSION_SaleAdNum'] . '_N' . $vSaleEditPixNumber . '.' . $vExtn;
//            $vSaleEditForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . $_SESSION['SESSION_SaleAdPid'] . '-' . $vSaleEditPixNumber . '.' . $vExtn;

//            $vSaleEditForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . substr(microtime(), 2,4) . '-' . $vSaleEditPixNumber . '.' . $vExtn;

            $vSaleEditForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . $vSaleEditPixNumber . '.' . $vExtn;

            $vArraySaleEditPixFileNames[] = $vSaleEditForEachFile['name'];

            $vEditSaleAdPixDirFolder = "saleadpix" ;
            if ( !file_exists($vEditSaleAdPixDirFolder) ) {
                mkdir($vEditSaleAdPixDirFolder);         
            } 
            
            $vEditSaleAdPixDirFolderUserID = "saleadpix/" . $_SESSION['SESSION_NKPUID'] ;
            if ( !file_exists($vEditSaleAdPixDirFolderUserID) ) {
                mkdir($vEditSaleAdPixDirFolderUserID);         
            } 

            $vSaleEditMoveUploadedFile = "saleadpix/" . $_SESSION['SESSION_NKPUID'] . "/"; 

            $vSaleEditMoveUploadedFile = $vSaleEditMoveUploadedFile . basename($vSaleEditForEachFile['name']) ; 
            
            move_uploaded_file($vSaleEditForEachFile['tmp_name'], $vSaleEditMoveUploadedFile);
            
            $remote_file = "saleadpix/" . $_SESSION['SESSION_NKPUID'] . "/" . $vSaleEditForEachFile['name'];

            chmod($remote_file,0644);

            $max_upload_width = MAX_UPLD_W ;
            $max_upload_height = MAX_UPLD_H ;

            // get width and height of original image
            list($image_width, $image_height) = getimagesize($remote_file);
            
          
            if (($image_width > $max_upload_width) || ($image_height > $max_upload_height))
            {
                $proportions = $image_width/$image_height;
                
                if ($image_width > $image_height)
                {
                    $new_width = $max_upload_width;
                    $new_height = round($max_upload_width/$proportions);
                }
                else
                {
                    $new_height = $max_upload_height;
                    $new_width = round($max_upload_height*$proportions);
                } 
               
                  $new_image = imagecreatetruecolor($new_width , $new_height);

                if ($vSaleEditForEachFile['type'] == "image/jpeg" || $vSaleEditForEachFile['type'] == "image/pjpeg")
                {	
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image,$remote_file);
                }
                
                if ($vSaleEditForEachFile['type'] == "image/png" || $vSaleEditForEachFile['type'] == "image/x-png")
                {
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagepng($new_image,$remote_file);
                }
                
                if ($vSaleEditForEachFile['type'] == "image/gif")
                {	
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagegif($new_image,$remote_file);
                } 
                
                imagedestroy($new_image);
                imagedestroy($image_source);
            }
            
          } 

      }

    }

  }


}


//  if ( ( isset($_POST['SaleEditPixAddSubmit']) ) && ( $_POST['SaleEditPixAddHidden'] == 'TRUE') )

  if ( ( isset($_POST['SaleEditPixAddSubmit']) ) && ( $_POST["SaleEditPixAddHidden"] == "TRUE" ) && ($vFlagSaleEditPixStatus == 1) )
  {

      $vFlagSaleEditPixStatus = 2 ;

//      $svNkpUid = $_SESSION['SESSION_NKPUID'];
      
      $svSaleEditPixAddPid = $_POST['SaleEditPixAddPid'];

      $vImplodeSaleEditPixFileNames = implode(" ", $vArraySaleEditPixFileNames);

      $vCountSaleEditPixFileNames = str_word_count($vImplodeSaleEditPixFileNames) / 4 ;

/*      
      echo'<br>';
      echo $vFlagSaleEditPixStatus;
      echo'<br>';
      echo $svNkpUid;
      echo'<br>';
      echo $svSaleEditPixAddPid;
      echo'<br>';
      echo $vCountSaleEditPixFileNames;
      echo'<br>';
      echo $vImplodeSaleEditPixFileNames;
      echo'<br>';
*/

      require_once ('dbcon.php');

      $vQuerySaleEditPixUpdate = "UPDATE `saleads` SET 
        `xc` = '$vCountSaleEditPixFileNames', 
        `pixfilename` = '$vImplodeSaleEditPixFileNames' 
        WHERE `sapid` = '$svSaleEditPixAddPid' "; 

      echo'<br>';
      echo $vQuerySaleEditPixUpdate;
      echo'<br>';
    
      $vResultSaleEditPixUpdate = mysqli_query($dbc, $vQuerySaleEditPixUpdate);

        if ($vResultSaleEditPixUpdate)
        { 

        }
        else
        {
          // echo 'Query Failed ...!';
          trigger_error("Query failed...");
        }
        

      mysqli_close($dbc);

/*
  $_SESSION['SESSION_SaleEditPixCount'] = $vCountSaleEditPixFileNames ;
  $_SESSION['SESSION_SaleEditPixFileNames'] = $vImplodeSaleEditPixFileNames ;
*/

  header("Location: my-property-for-sale-ad-view.php?pid=$svSaleEditPixAddPid");
  exit();
  
  }
  
?>


  
  
