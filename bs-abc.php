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
	include 'db-con.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>NCS SIT Dashboard</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom SB Admin CSS -->
	<link rel="stylesheet" href="css/sb-admin.css" />

	<!-- Custom MyCSS CSS -->
	<link rel="stylesheet" href="css/mycss.css" />

	<!-- bootstrap-datepicker3 CSS -->
	<link rel="stylesheet" href="css/bootstrap-datepicker3.min.css" />

	<!-- Custom Fonts -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<!-- bootstrap-datepicker  -->
	<script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

<!--
-->

<style>
body {
  overflow-y: scroll;
	background-image: url("img/topography.png");
	/*
	*/
}

#vm-db {
	color:#222; /* color:#DAA520; goldenrod */
}
#vm-db:hover {
	color:#FFD700; /* color:#FFD700; gold */
}
</style>

</head>

<body>

	<div id="wrapper" >

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand" href="index.php">CISCO</a> -->
				<!--
				<a class="" href=".">
				<img src="img/Cisco_Logo.png" alt="CISCO" height="51" width="95" align="right">
				</a>
			-->
			</div>

			<!-- Top Menu Items -->
			<ul class="nav navbar-right top-nav">
				<?php
					include 'bs-hm-qa.php';
				?>
				<?php
					include 'bs-hm-de.php';
				?>
				<?php
					include 'bs-hm-sl.php';
				?>
				<?php
					include 'bs-hm-rt.php';
				?>

				#<?php
				#	include 'bs-hm-ad.php';
				#?>

			</ul>


			<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav">

<!--
<br>
-->
					<li class="active0" style="border-top:1px solid #444; border-bottom:1px solid #999;">
						<a id="vm-db" href="dashboard.php"><i class="fa fa-fw fa-dashboard"></i>&nbsp; <b>DASHBOARD_HOME</b></a>
					</li>

					<!--   -->
					<?php
						include 'cd-sql.php';
					?>

					<?php
						include 'bs-dp.php';
					?>

					<?php
						include 'bs-vm-db.php';
					?>


					<?php
						include 'bs-vm-dd.php';
					?>

					<?php
						include 'bs-vm-dm.php';
					?>

					<?php
						include 'bs-vm-mp.php';
					?>

					<?php
						include 'bs-vm-sv.php';
					?>

					<?php
						include 'bs-vm-ts.php';
					?>

					<!--  -->
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>

		<div id="page-wrapper" style="background-image: url('img/topography.png');">

				<div class="container-fluid ">
