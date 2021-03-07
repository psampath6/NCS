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
	define('DB_HOST', 'localhost');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'qap_batman');

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);


	if (!$con)
		{
		die('Could not connect psampath: ' . mysqli_connect_error());
		}
?>
