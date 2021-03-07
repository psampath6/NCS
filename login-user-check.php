<?php

  session_start();

  if(!isset($_SESSION['SESSION_NKPUID']))
  {
    header("Location: login.php");
    exit;
  }

?>
