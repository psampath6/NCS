<?php
/*
** Copyright (c) 2021 NSD
**
** Name: index.php
**
** Author: Pradeep Sampath ( pradeepsampath@gmail.com )
**         Mar 2021
*/
?>

<?php
    define('DBHOST', 'localhost');
    define('DBUSER', '');
    define('DBPASSWORD', '');
    define('DBDATABASE', 'qap_batman');

    $dbc = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBDATABASE);

		// Check connection

		if (!$dbc)
		{
		    trigger_error('Could not connect to MySQL : ' . mysqli_connect_error());
		}

		if (mysqli_connect_errno())
		{
		    echo "Failed to connect to MySQL : " . mysqli_connect_error();
		}

		$dbs = mysqli_select_db($dbc, DBDATABASE);
		if (!$dbs) {
		    trigger_error("Unable to Connect / Select Database");
		}
?>
