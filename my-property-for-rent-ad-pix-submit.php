<?php 
//  session_start();

 include ('login-user-check.php');

if ( (isset($_POST['RentEditPixDeleteSubmit'])) && ($_POST['RentEditPixDeleteHidden'] == 'TRUE') )
{

  $vRentEditPixDeletePixPid = $_POST['RentEditPixDeletePixPid'];
  $vRentEditPixDeletePixCount = $_POST['RentEditPixDeletePixCount'];
  $vRentEditPixDeletePixFileNames = $_POST['RentEditPixDeletePixFileNames'];

  
  if ($vRentEditPixDeletePixCount != '0') 
  {
    $vExplodeRentEditPixDeletePixFileNames = explode(" ",$vRentEditPixDeletePixFileNames);  
    foreach ($vExplodeRentEditPixDeletePixFileNames as $vExplodeRentEditPixDeletePixFileNamesValue)
    {
      $vDeleteFromFolderRentEditPixDelete = "rap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vExplodeRentEditPixDeletePixFileNamesValue ; 
      unlink($vDeleteFromFolderRentEditPixDelete);
    }
  }

  require_once ('dbcon.php');
  
  $vQueryRentEditPixUpdate = "UPDATE `rentads` SET `xc` = '0' , `pixfilename` = '' WHERE `rapid` = '$vRentEditPixDeletePixPid' "; 

  mysqli_query($dbc, $vQueryRentEditPixUpdate);

  mysqli_close($dbc);


  unset($_SESSION['SESSION_RentEditPixCount']);
  unset($_SESSION['SESSION_RentEditPixFileNames']);

  
  header("Location: my-property-for-rent-ad-pix.php");
  exit();

}



if ( (isset($_POST['RentEditPixAddSubmit'])) && ($_POST['RentEditPixAddHidden'] == 'TRUE') )
{


define("MAX_IMG_SIZE", 2000000);  // 5242880

// define("MAX_UPLD_W", 800);  // 1024
// define("MAX_UPLD_H", 600);  //   768 

define("MAX_UPLD_W", 1024);  //  800
define("MAX_UPLD_H", 768);    //  600

ini_set('max_execution_time', 300);  // 300 seconds = 5 minutes
// set_time_limit(0);  // The maximum execution time, in seconds. If set to zero, no time limit is imposed. 

  $vFlagRentEditPixStatus = 1;
  
  $vFlagRentEditPixStatusErrMsg = '';


  if ( isset($_FILES['RentEditUploadPix']) )  
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

    if(count($_FILES['RentEditUploadPix'])) 
    {

      $vRentEditPixNumber = 0 ;

      $vArrayRentEditPixFileNames = array();

      $file_ary = reArrayFiles($_FILES['RentEditUploadPix']);
      
      foreach ($file_ary as $vRentEditForEachFile)
      {
         
        if ($vRentEditForEachFile['error'] != 4)
        {
          
          if ($vRentEditForEachFile['error'] > 0)
            {
                $vFlagRentEditPixStatus = 0;
                
                switch ($vRentEditForEachFile['error']) 
                {
                    case 1:
                        $vFlagRentEditPixStatusErrMsg = "The uploaded file(s) exceeds 2 MB (max_upload_filesize supported by the server)" ;
                        break;
                    case 2:
                        $vFlagRentEditPixStatusErrMsg = "The uploaded file(s) exceeds 2 MB (MAX_FILE_SIZE)" ;
                        break;
                    case 3:
                        $vFlagRentEditPixStatusErrMsg = "The uploaded file(s) was only partially uploaded." ;
                        break;
                    default:
                        $vFlagRentEditPixStatusErrMsg = "An error occurred when uploading the Property Photo." ;
                        break;
                }
                // die('An error occurred when uploading.');
            }
          else
            {
              if (!getimagesize($vRentEditForEachFile['tmp_name']))
                {
                    $vFlagRentEditPixStatus = 0;
                    $vFlagRentEditPixStatusErrMsg = "The uploaded file does not seem to be an image file ...";
                    // die('Please ensure you are uploading an image.');
                }
              else
                {
                  if ($vRentEditForEachFile['size'] > MAX_IMG_SIZE)
                    {
                        $vFlagRentEditPixStatus = 0;
                        $vFlagRentEditPixStatusErrMsg = "The uploaded File(s) exceeds maximum upload size limit of 2 MB";
                      //die('File uploaded exceeds maximum upload size of 2 MB.');
                    }
                  else
                    {
                      if  (  ($vRentEditForEachFile['type'] != "image/png")
                        && ($vRentEditForEachFile['type'] != "image/x-png")
                        && ($vRentEditForEachFile['type'] != "image/jpeg")
                        && ($vRentEditForEachFile['type'] != "image/jpg")
                        && ($vRentEditForEachFile['type'] != "image/pjpeg")
                        && ($vRentEditForEachFile['type'] != "image/gif") )
                        {
                            $vFlagRentEditPixStatus = 0;
                            $vFlagRentEditPixStatusErrMsg = "Only image files ( .GIF / .JPG / .JPEG / .PNG images ) are allowed to upload.";
                            //die('U can not upload an unsupported file-type. Only image files like .PNG / .JPG / .JPEG / .GIF are allowed...');
                        }
                    }
                }
            }
        }
        
        $valwdextns = array("gif", "jpeg", "jpg", "png");
        $vtemp = explode(".", $vRentEditForEachFile['name']);
        $vextension = end($vtemp);


        if ((($vRentEditForEachFile['type'] == "image/gif")
          || ($vRentEditForEachFile['type'] == "image/jpeg")
          || ($vRentEditForEachFile['type'] == "image/jpg")
          || ($vRentEditForEachFile['type'] == "image/pjpeg")
          || ($vRentEditForEachFile['type'] == "image/x-png")
          || ($vRentEditForEachFile['type'] == "image/png"))
          && ($vRentEditForEachFile['size'] < MAX_IMG_SIZE)
          && in_array($vextension, $valwdextns))
          {

           
            $vPath = $vRentEditForEachFile['name'];
            $vExtn = pathinfo($vPath, PATHINFO_EXTENSION);
            $vExtn = strtolower($vExtn);

            $vRentEditPixNumber = $vRentEditPixNumber + 1 ;

            date_default_timezone_set('America/Los_Angeles');
            
            // $vRentEditForEachFile['name'] = 'R_D' . date('Ymd') . '_T' . date('His') . '_M' . substr(microtime(), 2,4) . '_A' . $_SESSION['SESSION_RentAdNum'] . '_N' . $vRentEditPixNumber . '.' . $vExtn;
//            $vRentEditForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . $_SESSION['SESSION_RentAdPid'] . '-' . $vRentEditPixNumber . '.' . $vExtn;

//            $vRentEditForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . substr(microtime(), 2,4) . '-' . $vRentEditPixNumber . '.' . $vExtn;

            $vRentEditForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . $vRentEditPixNumber . '.' . $vExtn;

            $vArrayRentEditPixFileNames[] = $vRentEditForEachFile['name'];

            $vEditRentAdPixDirFolder = "rap" ;
            if ( !file_exists($vEditRentAdPixDirFolder) ) {
                mkdir($vEditRentAdPixDirFolder);         
            } 
            
            $vEditRentAdPixDirFolderUserID = "rap/" . $_SESSION['SESSION_NKPUID'] ;
            if ( !file_exists($vEditRentAdPixDirFolderUserID) ) {
                mkdir($vEditRentAdPixDirFolderUserID);         
            } 

            $vRentEditMoveUploadedFile = "rap/" . $_SESSION['SESSION_NKPUID'] . "/"; 

            $vRentEditMoveUploadedFile = $vRentEditMoveUploadedFile . basename($vRentEditForEachFile['name']) ; 
            
            move_uploaded_file($vRentEditForEachFile['tmp_name'], $vRentEditMoveUploadedFile);
            
            $remote_file = "rap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vRentEditForEachFile['name'];

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

                if ($vRentEditForEachFile['type'] == "image/jpeg" || $vRentEditForEachFile['type'] == "image/pjpeg")
                {	
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image,$remote_file);
                }
                
                if ($vRentEditForEachFile['type'] == "image/png" || $vRentEditForEachFile['type'] == "image/x-png")
                {
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagepng($new_image,$remote_file);
                }
                
                if ($vRentEditForEachFile['type'] == "image/gif")
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


//  if ( ( isset($_POST['RentEditPixAddSubmit']) ) && ( $_POST['RentEditPixAddHidden'] == 'TRUE') )

  if ( ( isset($_POST['RentEditPixAddSubmit']) ) && ( $_POST["RentEditPixAddHidden"] == "TRUE" ) && ($vFlagRentEditPixStatus == 1) )
  {

      $vFlagRentEditPixStatus = 2 ;

//      $svNkpUid = $_SESSION['SESSION_NKPUID'];
      
      $svRentEditPixAddPid = $_POST['RentEditPixAddPid'];

      $vImplodeRentEditPixFileNames = implode(" ", $vArrayRentEditPixFileNames);

      $vCountRentEditPixFileNames = str_word_count($vImplodeRentEditPixFileNames) / 4 ;

/*      
      echo'<br>';
      echo $vFlagRentEditPixStatus;
      echo'<br>';
      echo $svNkpUid;
      echo'<br>';
      echo $svRentEditPixAddPid;
      echo'<br>';
      echo $vCountRentEditPixFileNames;
      echo'<br>';
      echo $vImplodeRentEditPixFileNames;
      echo'<br>';
*/

      require_once ('dbcon.php');

      $vQueryRentEditPixUpdate = "UPDATE `rentads` SET 
        `xc` = '$vCountRentEditPixFileNames', 
        `pixfilename` = '$vImplodeRentEditPixFileNames' 
        WHERE `rapid` = '$svRentEditPixAddPid' "; 

      echo'<br>';
      echo $vQueryRentEditPixUpdate;
      echo'<br>';
    
      $vResultRentEditPixUpdate = mysqli_query($dbc, $vQueryRentEditPixUpdate);

        if ($vResultRentEditPixUpdate)
        { 

        }
        else
        {
          // echo 'Query Failed ...!';
          trigger_error("Query failed...");
        }
        

      mysqli_close($dbc);

/*
  $_SESSION['SESSION_RentEditPixCount'] = $vCountRentEditPixFileNames ;
  $_SESSION['SESSION_RentEditPixFileNames'] = $vImplodeRentEditPixFileNames ;
*/

  header("Location: my-property-for-rent-ad-view.php?pid=$svRentEditPixAddPid");
  exit();
  
  }
  
?>


  
  
