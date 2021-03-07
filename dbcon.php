<?php

define('DBHOST', 'localhost');
define('DBUSER', '');
define('DBPASS', '');
define('DBNAME', 'qap_batman');

$dbc = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection

if (!$dbc)
{
    trigger_error('Could not connect to MySQL : ' . mysqli_connect_error());
}

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL : " . mysqli_connect_error();
}

$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    trigger_error("Unable to Connect / Select Database");
}

?>
