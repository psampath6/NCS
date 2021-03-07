<?php

// session_start();

include ('login-user-check.php');

define("MAX_IMG_SIZE", 2000000);  // 5242880

// define("MAX_UPLD_W", 800);  // 1024
// define("MAX_UPLD_H", 600);  //   768 

define("MAX_UPLD_W", 1024);  //  800
define("MAX_UPLD_H", 768);    //  600

ini_set('max_execution_time', 300);  // 300 seconds = 5 minutes
// set_time_limit(0);  // The maximum execution time, in seconds. If set to zero, no time limit is imposed. 

  $vFlagRentPostStatus = 1;

  $vFlagRentPostErrorMsg = '';

if ( ( isset( $_POST["RentPostSubmit"] ) ) && ( $_POST["RentPostHidden"] == "TRUE" ) ) 
{

  if ( isset($_FILES['RentPostUploadPix']) )  
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

    if(count($_FILES['RentPostUploadPix'])) 
    {

      $vRentPostPixNumber = 0 ;
    
      $vArrayRentPostPixFileNames = array();
      
      $file_ary = reArrayFiles($_FILES['RentPostUploadPix']);
      
      foreach ($file_ary as $vRentPostForEachFile)
      {
        
        if ($vRentPostForEachFile['error'] != 4)
        {
          
          if ($vRentPostForEachFile['error'] > 0)
            {
                $vFlagRentPostStatus = 0;
                switch ($vRentPostForEachFile['error']) 
                {
                    case 1:
                        $vFlagRentPostErrorMsg = "The uploaded file(s) exceeds 2 MB (max_upload_filesize supported by the server)" ;
                        break;
                    case 2:
                        $vFlagRentPostErrorMsg = "The uploaded file(s) exceeds 2 MB (MAX_FILE_SIZE)" ;
                        break;
                    case 3:
                        $vFlagRentPostErrorMsg = "The uploaded file(s) was only partially uploaded." ;
                        break;
                    default:
                        $vFlagRentPostErrorMsg = "An error occurred when uploading the Property Photo." ;
                        break;
                }
                // die('An error occurred when uploading.');
            }
          else
            {
              if (!getimagesize($vRentPostForEachFile['tmp_name']))
                {
                    $vFlagRentPostStatus = 0;
                    $vFlagRentPostErrorMsg = "The uploaded file does not seem to be an image file ...";
                    // die('Please ensure you are uploading an image.');
                }
              else
                {
                  if ($vRentPostForEachFile['size'] > MAX_IMG_SIZE)
                    {
                        $vFlagRentPostStatus = 0;
                        $vFlagRentPostErrorMsg = "The uploaded File(s) exceeds maximum upload size limit of 2 MB";
                      // die('File uploaded exceeds maximum upload size of 2 MB.');
                    }
                  else
                    {
                      if  (  ($vRentPostForEachFile['type'] != "image/png")
                        && ($vRentPostForEachFile['type'] != "image/x-png")
                        && ($vRentPostForEachFile['type'] != "image/jpeg")
                        && ($vRentPostForEachFile['type'] != "image/jpg")
                        && ($vRentPostForEachFile['type'] != "image/pjpeg")
                        && ($vRentPostForEachFile['type'] != "image/gif") )
                        {
                            $vFlagRentPostStatus = 0;
                            $vFlagRentPostErrorMsg = "Only image files ( .GIF / .JPG / .JPEG / .PNG images ) are allowed to upload.";
                            // die('U can not upload an unsupported file-type. Only image files like .PNG / .JPG / .JPEG / .GIF are allowed...');
                        }
                    }
                }
            }
        }
        
        $valwdextns = array("gif", "jpeg", "jpg", "png");
        $vtemp = explode(".", $vRentPostForEachFile['name']);
        $vextension = end($vtemp);


        if ((($vRentPostForEachFile['type'] == "image/gif")
          || ($vRentPostForEachFile['type'] == "image/jpeg")
          || ($vRentPostForEachFile['type'] == "image/jpg")
          || ($vRentPostForEachFile['type'] == "image/pjpeg")
          || ($vRentPostForEachFile['type'] == "image/x-png")
          || ($vRentPostForEachFile['type'] == "image/png"))
          && ($vRentPostForEachFile['size'] < MAX_IMG_SIZE)
          && in_array($vextension, $valwdextns))
          {
          
              //            $vFlagRentPostStatus = 2 ;

            $vPath = $vRentPostForEachFile['name'];
            $vExtn = pathinfo($vPath, PATHINFO_EXTENSION);
            $vExtn = strtolower($vExtn);

            require_once ('dbcon.php');

/*
            $vQueryRentPostTableStatus = "SHOW TABLE STATUS LIKE  'rentads' ";

            $vResultRentPostTableStatus = mysqli_query($dbc, $vQueryRentPostTableStatus); 

            $vFetchRentPostTableStatus = mysqli_fetch_assoc($vResultRentPostTableStatus); 

            $vRentPostAutoIncrementValue = $vFetchRentPostTableStatus["Auto_increment"];
*/

            $vRentPostPixNumber = $vRentPostPixNumber + 1 ;

            date_default_timezone_set('America/Los_Angeles');

// $vRentPostForEachFile['name'] = 'R_D' . date('Ymd') . '_T' . date('His') . '_M' . substr(microtime(), 2,4) . '_A' . $vRentPostAutoIncrementValue . '_N' . $vRentPostPixNumber . '.' . $vExtn;
// $vRentPostForEachFile['name'] = 'RD' . date('Ymd') . 'T' . date('His') . 'A' . $vRentPostAutoIncrementValue . 'X' . $vRentPostPixNumber . '.' . $vExtn;
//            $vRentPostForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . $vRentPostAutoIncrementValue . '-' . $vRentPostPixNumber . '.' . $vExtn;

//            $vRentPostForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . substr(microtime(), 2,4) . '-' . $vRentPostPixNumber . '.' . $vExtn;

            $vRentPostForEachFile['name'] = 'R-' . date('Ymd-His') . '-' . $vRentPostPixNumber . '.' . $vExtn;

            $vArrayRentPostPixFileNames[] = $vRentPostForEachFile['name'];

            $vRentPostAdPixDirFolder = "rap" ;
            if ( !file_exists($vRentPostAdPixDirFolder) ) {
                mkdir($vRentPostAdPixDirFolder);         
            } 
            
            $vRentPostAdPixDirFolderUserID = "rap/" . $_SESSION['SESSION_NKPUID'] ;
            if ( !file_exists($vRentPostAdPixDirFolderUserID) ) {
                mkdir($vRentPostAdPixDirFolderUserID);         
            } 

            $vRentPostMoveUploadedFile = "rap/" . $_SESSION['SESSION_NKPUID'] . "/"; 

            $vRentPostMoveUploadedFile = $vRentPostMoveUploadedFile . basename($vRentPostForEachFile['name']) ; 
            
            move_uploaded_file($vRentPostForEachFile['tmp_name'], $vRentPostMoveUploadedFile);
            
            $remote_file = "rap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vRentPostForEachFile['name'];

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

                if ($vRentPostForEachFile['type'] == "image/jpeg" || $vRentPostForEachFile['type'] == "image/pjpeg")
                {	
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image,$remote_file);
                }
                
                if ($vRentPostForEachFile['type'] == "image/png" || $vRentPostForEachFile['type'] == "image/x-png")
                {
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagepng($new_image,$remote_file);
                }
                
                if ($vRentPostForEachFile['type'] == "image/gif")
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


  if ( ( isset($_POST['RentPostSubmit']) )  && ( $vFlagRentPostStatus == 1 ) && ( $_POST["RentPostHidden"] == "TRUE" ) )
  {
      
      $vFlagRentPostStatus = 2 ;

      require_once ('dbcon.php');

      $svNkpUid = $_SESSION['SESSION_NKPUID'];

      $vRentPostPropType = $_POST['RentPostPropType'];

      $vRentPostPlace = $_POST['RentPostPlace'];

      $vRentPostUserType = $_POST['RentPostUserType'];


      if ($vRentPostPropType == '1')
      {
      
        $vRentPostBedroom = trim($_POST['RentPostBedroom']);
        
        $vRentPostBuiltSize = trim($_POST['RentPostBuiltSize']);
        $vRentPostBuiltSize = mysqli_real_escape_string($dbc, $vRentPostBuiltSize);

      }

      if ($vRentPostPropType == '2')
      {
        $vRentPostBedroom = trim($_POST['RentPostBedroom']);

        $vRentPostBuiltSize = trim($_POST['RentPostBuiltSize']);
        $vRentPostBuiltSize = mysqli_real_escape_string($dbc, $vRentPostBuiltSize);
        
      }

      if ($vRentPostPropType == '3')
      {
      
        $vRentPostBedroom = '-';
        
        $vRentPostBuiltSize = trim($_POST['RentPostBuiltSize']);
        $vRentPostBuiltSize = mysqli_real_escape_string($dbc, $vRentPostBuiltSize);


      }

      $vRentPostUnit = trim($_POST['RentPostUnit']);

      $vRentPostDepositAmt = trim($_POST['RentPostDepositAmt']);
      $vRentPostDepositAmt = mysqli_real_escape_string($dbc, $vRentPostDepositAmt);
      
      $vRentPostRentAmt = trim($_POST['RentPostRentAmt']);
      $vRentPostRentAmt = mysqli_real_escape_string($dbc, $vRentPostRentAmt);
      
      $vRentPostCPName = trim($_POST['RentPostCPName']);
      $vRentPostCPName = mysqli_real_escape_string($dbc, $vRentPostCPName);
      
      $vRentPostCPNumber = trim($_POST['RentPostCPNumber']);
      $vRentPostCPNumber = mysqli_real_escape_string($dbc, $vRentPostCPNumber);
      
      $vRentPostCPEmailid = trim($_POST['RentPostCPEmailid']);
      $vRentPostCPEmailid = mysqli_real_escape_string($dbc, $vRentPostCPEmailid);
      
      $vRentPostAddress = trim($_POST['RentPostAddress']);
      $vRentPostAddress = mysqli_real_escape_string($dbc, $vRentPostAddress);
      
      $vRentPostTitle = trim($_POST['RentPostTitle']);
      $vRentPostTitle = mysqli_real_escape_string($dbc, $vRentPostTitle);
      
      $vRentPostDescription = trim($_POST['RentPostDescription']);
      $vRentPostDescription = mysqli_real_escape_string($dbc, $vRentPostDescription);


      /*
      if ( isset($_FILES['RentPostUploadPix']) )  
      {
      */
      
      if ( isset($vArrayRentPostPixFileNames) )  
      {
          $vImplodeRentPostPixFileNames = implode(" ", $vArrayRentPostPixFileNames);
      }
      else
      {
          $vImplodeRentPostPixFileNames = '';
      }
       
      $vCountRentPostPixFileNames = str_word_count($vImplodeRentPostPixFileNames) / 4 ;

      date_default_timezone_set('America/Los_Angeles'); 
      
//      $vRentAdPostDate = date("Y-m-d H:i:s");
//          `radate`, 
//          '$vRentAdPostDate', 

      $vRentAdPid = date('YmdHis') . substr(microtime(), 2,6) ;

      $vRentPostSmm = str_replace(',', '', $vRentPostRentAmt); 

      $vQueryRentPostInsert = "INSERT INTO `rentads` 
        (
          `nkpuid`, 
          `rapid`, 
          `place`, 
          `pt`, 
          `ut`, 
          `built`, 
          `su`, 
          `nb`, 
          `deposit`, 
          `rent`, 
          `cname`, 
          `cnumber`, 
          `cemail`, 
          `address`, 
          `title`, 
          `description`, 
          `xc`, 
          `pixfilename`,  
          `smm` 
        )
        VALUES 
        (
          '$svNkpUid', 
          '$vRentAdPid', 
          '$vRentPostPlace', 
          '$vRentPostPropType', 
          '$vRentPostUserType', 
          '$vRentPostBuiltSize', 
          '$vRentPostUnit', 
          '$vRentPostBedroom',  
          '$vRentPostDepositAmt', 
          '$vRentPostRentAmt', 
          '$vRentPostCPName', 
          '$vRentPostCPNumber', 
          '$vRentPostCPEmailid', 
          '$vRentPostAddress', 
          '$vRentPostTitle', 
          '$vRentPostDescription', 
          '$vCountRentPostPixFileNames', 
          '$vImplodeRentPostPixFileNames', 
          '$vRentPostSmm' 
        )";
     
      $vResultRentPostInsert = mysqli_query($dbc, $vQueryRentPostInsert);

        if ($vResultRentPostInsert)
        { 
        }
        else
        {
          // echo 'Query Failed ...!';
          trigger_error("Query failed...");
        }
      mysqli_close($dbc);
  }
  

?>
