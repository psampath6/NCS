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

  if(!isset($_SESSION['SESSION_NKPUID']))
  {
    header("Location: login.php");
    exit;
  }


  $vsNkpUid = $_SESSION['SESSION_NKPUID'];

  $vsEmailid = $_SESSION['SESSION_EMAILID'];

  $vsFirstName = $_SESSION['SESSION_FIRSTNAME'];

  $vsLastName = $_SESSION['SESSION_LASTNAME'];

?>
<style>
</style>

	<!--
	-->
	<li class="dropdown">
			<a id="NbLogout" href="#" class="dropdown-toggle" data-toggle="dropdown"
						title="<?php echo ucwords($vsFirstName) . ' ' . ucwords($vsLastName); echo ' <' . strtolower($vsEmailid) . '>'; ?>">
						<?php
							echo ucwords($vsFirstName) ;
						?>
					 <b class="caret"></b>
			</a>

			<ul class="dropdown-menu">
				<li>
					<a href="#" style="cursor: default;">
						<?php
						echo ucwords($vsFirstName) . ' ' . ucwords($vsLastName) ;
						echo ' <br>' ;
						echo strtolower($vsEmailid);
						?>
						<br>
						<span style="font-size:5px">-------------------------</span>
					</a>
				</li>
				<li>
					<a href="logout.php" class="NbLogout">
						<b>Logout</b>
					</a>
				</li>
			</ul>
	</li>
