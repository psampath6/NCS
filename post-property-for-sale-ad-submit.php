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

  $vFlagSalePostStatus = 1;
  
  $vFlagSalePostErrorMsg = '';

if ( ( isset( $_POST["SalePostSubmit"] ) ) && ( $_POST["SalePostHidden"] == "TRUE" ) ) 
{

  if ( isset($_FILES['SalePostUploadPix']) )  
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

    if(count($_FILES['SalePostUploadPix'])) 
    {

      $vSalePostPixNumber = 0 ;

      $vArraySalePostPixFileNames = array();
      
      $file_ary = reArrayFiles($_FILES['SalePostUploadPix']);
      
      foreach ($file_ary as $vSalePostForEachFile)
      {
         
        if ($vSalePostForEachFile['error'] != 4)
        {

          if ($vSalePostForEachFile['error'] > 0)
            {
                $vFlagSalePostStatus = 0;
                switch ($vSalePostForEachFile['error']) 
                {
                    case 1:
                        $vFlagSalePostErrorMsg = "The uploaded file(s) exceeds 2 MB (max_upload_filesize supported by the server)" ;
                        break;
                    case 2:
                        $vFlagSalePostErrorMsg = "The uploaded file(s) exceeds 2 MB (MAX_FILE_SIZE)" ;
                        break;
                    case 3:
                        $vFlagSalePostErrorMsg = "The uploaded file(s) was only partially uploaded." ;
                        break;
                    default:
                        $vFlagSalePostErrorMsg = "An error occurred when uploading the Property Photo." ;
                        break;
                }
                // die('An error occurred when uploading.');
            }
          else
            {
              if (!getimagesize($vSalePostForEachFile['tmp_name']))
                {
                    $vFlagSalePostStatus = 0;
                    $vFlagSalePostErrorMsg = "The uploaded file does not seem to be an image file ...";
                    // die('Please ensure you are uploading an image.');
                }
              else
                {
                  if ($vSalePostForEachFile['size'] > MAX_IMG_SIZE)
                    {
                        $vFlagSalePostStatus = 0;
                        $vFlagSalePostErrorMsg = "The uploaded File(s) exceeds maximum upload size limit of 2 MB";
                      // die('File uploaded exceeds maximum upload size of 2 MB.');
                    }
                  else
                    {
                      if  (  ($vSalePostForEachFile['type'] != "image/png")
                        && ($vSalePostForEachFile['type'] != "image/x-png")
                        && ($vSalePostForEachFile['type'] != "image/jpeg")
                        && ($vSalePostForEachFile['type'] != "image/jpg")
                        && ($vSalePostForEachFile['type'] != "image/pjpeg")
                        && ($vSalePostForEachFile['type'] != "image/gif") )
                        {
                            $vFlagSalePostStatus = 0;
                            $vFlagSalePostErrorMsg = "Only image files ( .GIF / .JPG / .JPEG / .PNG images ) are allowed to upload.";
                            // die('U can not upload an unsupported file-type. Only image files like .PNG / .JPG / .JPEG / .GIF are allowed...');
                        }
                    }
                }
            }
        }
        
        $valwdextns = array("gif", "jpeg", "jpg", "png");
        $vtemp = explode(".", $vSalePostForEachFile['name']);
        $vextension = end($vtemp);


        if ((($vSalePostForEachFile['type'] == "image/gif")
          || ($vSalePostForEachFile['type'] == "image/jpeg")
          || ($vSalePostForEachFile['type'] == "image/jpg")
          || ($vSalePostForEachFile['type'] == "image/pjpeg")
          || ($vSalePostForEachFile['type'] == "image/x-png")
          || ($vSalePostForEachFile['type'] == "image/png"))
          && ($vSalePostForEachFile['size'] < MAX_IMG_SIZE)
          && in_array($vextension, $valwdextns))
          {

              //            $vFlagSalePostStatus = 2 ; 

            $vPath = $vSalePostForEachFile['name'];
            $vExtn = pathinfo($vPath, PATHINFO_EXTENSION);
            $vExtn = strtolower($vExtn);

            require_once ('dbcon.php');

/*
            $vQuerySalePostTableStatus = "SHOW TABLE STATUS LIKE  'saleads' ";

            $vResultSalePostTableStatus = mysqli_query($dbc, $vQuerySalePostTableStatus); 

            $vFetchSalePostTableStatus = mysqli_fetch_assoc($vResultSalePostTableStatus); 

            $vSalePostAutoIncrementValue = $vFetchSalePostTableStatus["Auto_increment"]; 
*/

            $vSalePostPixNumber = $vSalePostPixNumber + 1 ;

            date_default_timezone_set('America/Los_Angeles');
            
//            $vSalePostForEachFile['name'] = 'S_D' . date('Ymd') . 'T' . date('His') . 'M' . substr(microtime(), 2,4) . 'A' . $vSalePostAutoIncrementValue . '_P' . $vSalePostPixNumber . '.' . $vExtn;
//            $vSalePostForEachFile['name'] = 'SD' . date('Ymd') . 'T' . date('His') . 'A' . $vSalePostAutoIncrementValue . 'X' . $vSalePostPixNumber . '.' . $vExtn;
//            $vSalePostForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . $vSalePostAutoIncrementValue . '-' . $vSalePostPixNumber . '.' . $vExtn;

//            $vSalePostForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . substr(microtime(), 2,4) . '-' . $vSalePostPixNumber . '.' . $vExtn;

            $vSalePostForEachFile['name'] = 'S-' . date('Ymd-His') . '-' . $vSalePostPixNumber . '.' . $vExtn;

            $vArraySalePostPixFileNames[] = $vSalePostForEachFile['name'];

            $vSalePostAdPixDirFolder = "sap" ;
            if ( !file_exists($vSalePostAdPixDirFolder) ) {
                mkdir($vSalePostAdPixDirFolder);         
            } 
            
            $vSalePostAdPixDirFolderUserID = "sap/" . $_SESSION['SESSION_NKPUID'] ;
            if ( !file_exists($vSalePostAdPixDirFolderUserID) ) {
                mkdir($vSalePostAdPixDirFolderUserID);         
            } 

            $vSalePostMoveUploadedFile = "sap/" . $_SESSION['SESSION_NKPUID'] . "/"; 
            
            $vSalePostMoveUploadedFile = $vSalePostMoveUploadedFile . basename($vSalePostForEachFile['name']) ; 
            
            move_uploaded_file($vSalePostForEachFile['tmp_name'], $vSalePostMoveUploadedFile);
            
            $remote_file = "sap/" . $_SESSION['SESSION_NKPUID'] . "/" . $vSalePostForEachFile['name'];

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

                if ($vSalePostForEachFile['type'] == "image/jpeg" || $vSalePostForEachFile['type'] == "image/pjpeg")
                {	
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image,$remote_file);
                }
                
                if ($vSalePostForEachFile['type'] == "image/png" || $vSalePostForEachFile['type'] == "image/x-png")
                {
                    $image_source = imagecreatefromjpeg($remote_file);
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagepng($new_image,$remote_file);
                }
                
                if ($vSalePostForEachFile['type'] == "image/gif")
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


  if ( ( isset($_POST['SalePostSubmit']) )  && ( $vFlagSalePostStatus == 1 ) && ( $_POST["SalePostHidden"] == "TRUE" ) )
  {

      $vFlagSalePostStatus = 2 ;

      $svNkpUid = $_SESSION['SESSION_NKPUID'];
      

      $vSalePostPropType = $_POST['SalePostPropType'];
        
      $vSalePostPlace = $_POST['SalePostPlace'];

      $vSalePostUserType = $_POST['SalePostUserType'];

      require_once ('dbcon.php');

      if ($vSalePostPropType == '1')
      {
        $vSalePostBedroom = '-';

        $vSalePostBuiltSize = '-';

        $vSalePostLandSize = trim($_POST['SalePostLandSize']);
        $vSalePostLandSize = mysqli_real_escape_string($dbc, $vSalePostLandSize);

      }

      if ($vSalePostPropType == '2')
      {
      
        $vSalePostBedroom = trim($_POST['SalePostBedroom']);
        $vSalePostBedroom = mysqli_real_escape_string($dbc, $vSalePostBedroom);

        $vSalePostBuiltSize = trim($_POST['SalePostBuiltSize']);
        $vSalePostBuiltSize = mysqli_real_escape_string($dbc, $vSalePostBuiltSize);

        $vSalePostLandSize = '-';
        
      }

      if ($vSalePostPropType == '3')
      {
      
        $vSalePostBedroom = trim($_POST['SalePostBedroom']);
        $vSalePostBedroom = mysqli_real_escape_string($dbc, $vSalePostBedroom);
        
        $vSalePostBuiltSize = trim($_POST['vSalePostBuiltSize']);
        $vSalePostBuiltSize = mysqli_real_escape_string($dbc, $vSalePostBuiltSize);

        $vSalePostLandSize = trim($_POST['SalePostLandSize']);
        $vSalePostLandSize = mysqli_real_escape_string($dbc, $vSalePostLandSize);

      }

      if ($vSalePostPropType == '4')
      {
      
        $vSalePostBedroom = '-';
        
        $vSalePostBuiltSize = trim($_POST['SalePostBuiltSize']);
        $vSalePostBuiltSize = mysqli_real_escape_string($dbc, $vSalePostBuiltSize);

        $vSalePostLandSize = trim($_POST['SalePostLandSize']);
        $vSalePostLandSize = mysqli_real_escape_string($dbc, $vSalePostLandSize);

      }

        $vSalePostUnit = trim($_POST['SalePostUnit']);

        switch ($vSalePostUnit) 
        {
            case 'Sq.Ft.':
                $vSalePostUnit = "F" ;
                break;
            case 'Sq.Mtr.':
                $vSalePostUnit = "M" ;
                break;
            case 'Acre':
                $vSalePostUnit = "A" ;
                break;
        }

      $vSalePostRate = trim($_POST['SalePostRate']);
      $vSalePostRate = mysqli_real_escape_string($dbc, $vSalePostRate);
      
      $vSalePostPrice = trim($_POST['SalePostPrice']);
      $vSalePostPrice = mysqli_real_escape_string($dbc, $vSalePostPrice);

      $vSalePostCPName = trim($_POST['SalePostCPName']);
      $vSalePostCPName = mysqli_real_escape_string($dbc, $vSalePostCPName);
      
      $vSalePostCPNumber = trim($_POST['SalePostCPNumber']);
      $vSalePostCPNumber = mysqli_real_escape_string($dbc, $vSalePostCPNumber);
      
      $vSalePostCPEmailid = trim($_POST['SalePostCPEmailid']);
      $vSalePostCPEmailid = mysqli_real_escape_string($dbc, $vSalePostCPEmailid);
      
      $vSalePostAddress = trim($_POST['SalePostAddress']);
      $vSalePostAddress = mysqli_real_escape_string($dbc, $vSalePostAddress);
      
      $vSalePostTitle = trim($_POST['SalePostTitle']);
      $vSalePostTitle = mysqli_real_escape_string($dbc, $vSalePostTitle);
      
      $vSalePostDescription = trim($_POST['SalePostDescription']);
      $vSalePostDescription = mysqli_real_escape_string($dbc, $vSalePostDescription);

      /*
      if ( isset($_FILES['SalePostUploadPix']) )  
      {
      */
      
      if ( isset($vArraySalePostPixFileNames) )  
      {
            $vImplodeSalePostPixFileNames = implode(" ", $vArraySalePostPixFileNames);
      }
      else
      {
          $vImplodeSalePostPixFileNames = '';
      }
       
      $vCountSalePostPixFileNames = str_word_count($vImplodeSalePostPixFileNames) / 4 ;
       
      date_default_timezone_set('America/Los_Angeles'); 
      
//      $vSaleAdPostDate = date("Y-m-d H:i:s");
//          `sadate`, 
//          '$vSaleAdPostDate', 

      $vSaleAdPid = date('YmdHis') . substr(microtime(), 2,6) ;

      $vSalePostSmm = str_replace(',', '', $vSalePostPrice); 

//      $vSalePostSmm = (int) $vSalePostSmm  ;
      
      $vQuerySalePostInsert = "INSERT INTO `saleads` 
        (
          `nkpuid`, 
          `sapid`, 
          `place`, 
          `pt`, 
          `ut`, 
          `built`, 
          `land`, 
          `su`, 
          `nb`, 
          `rate`, 
          `price`, 
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
          '$vSaleAdPid', 
          '$vSalePostPlace', 
          '$vSalePostPropType', 
          '$vSalePostUserType', 
          '$vSalePostBuiltSize', 
          '$vSalePostLandSize', 
          '$vSalePostUnit', 
          '$vSalePostBedroom',  
          '$vSalePostRate', 
          '$vSalePostPrice', 
          '$vSalePostCPName', 
          '$vSalePostCPNumber', 
          '$vSalePostCPEmailid', 
          '$vSalePostAddress', 
          '$vSalePostTitle', 
          '$vSalePostDescription', 
          '$vCountSalePostPixFileNames', 
          '$vImplodeSalePostPixFileNames', 
          '$vSalePostSmm' 
        )";
     
      $vResultSalePostInsert = mysqli_query($dbc, $vQuerySalePostInsert);

        if ($vResultSalePostInsert)
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
