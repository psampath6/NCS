<?php
        /*
        ** Copyright (c) 2018 Cisco
        **
        ** Name: index.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

<?php
    if  (!isset($_SESSION['SESSION_NKPUID'])) {
      include ('bs-abc.php');
      include ('cd-home.php');
      include ('bs-xyz.php');
    } else {
      include ('navbar.php');
    }
?>
