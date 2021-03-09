<?php
        /*
        ** Copyright (c) 2018 Cisco
        **
        ** Name: test-step.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

<?php
	include 'bs-abc.php';
?>

<?php 
	include 'go-back.php'; 
?>	

<?php 

if (isset($_POST['app']))
{
	$bid = $_POST['bid'];
	$app = $_POST['app'];
	$dte = $_POST['dte'];

	$tids = $_POST['tid'];
	$cids = $_POST['cid'];
}
else
{
	$bid = ""; 
	$app = ""; 
	$dte = ""; 
	
	$tids = ""; 
	$cids = ""; 
	echo "<script>window.location.replace('/');</script>";
}

//	echo "Selected Date : ".$dte; 
	echo "<button style='cursor:default;' class='btn btn-secondary'>Date : ".$dte."</button>"; 
	
	echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"; 
	
//	echo "Application : ".$app; 
	echo "<button style='cursor:default;' class='btn btn-secondary'>Application : ".$app."</button>"; 
	
	echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;"; 
	
//	echo "Latest Build : ".$bid; 
	echo "<button style='cursor:default;' class='btn btn-secondary'>Build : ".$bid."</button>"; 

	

	echo "<br /><br />";

	echo "&nbsp;&nbsp; Test Steps : ";	
	echo "<br />";

	$result_step = mysqli_query($dbc, "SELECT * FROM tstep WHERE tid = '$tids' && cid = '$cids' ");

	if ( ! mysqli_num_rows($result_step) ) 
	{
		echo "<br>";
		echo "<pre> <h4> <i> No <b>Steps</b> found for the Test Case ... </i> </h4> </pre>"; 
		echo "<br>";
		echo "<div style='height:120px;'></div>";
	}
else
	{

?>

	<div class='table-responsive table'>
	
		<table class='table-hover table-striped' width='100%' border='0'>
			<tr>
				<th scope='col'>TS ID</th>
				<th scope='col'>Name</th>
				<th scope='col'>Description</th>
				<th scope='col'>Log</th>
				<th scope='col'>Status</th>
				<th scope='col'>State</th>
				<th scope='col'>Start Date</th>
				<th scope='col'>End Date</th>
			</tr>

<?php
	while ($row_step = mysqli_fetch_array($result_step))
		{

		$ucs = "$row_step[ucid]" . "$row_step[usid]" ;
		if ("$row_step[status]" == "pass") $bgcs = 'pass';
		if ("$row_step[status]" == "fail") $bgcs = 'fail';
		if ("$row_step[status]" == "fatal")	$bgcs = 'fatal';
		if ("$row_step[status]" == "untested")	$bgcs = 'untested';
		if ("$row_step[status]" == "unsupported")	$bgcs = 'unsupported';
		if ("$row_step[status]" == "invalid")	$bgcs = 'invalid';

		$rstatus = ucfirst("$row_step[status]");

		if ("$row_step[state]" == "completed") $bgce = 'completed';
		if ("$row_step[state]" == "running") $bgce = 'running';

		$rstate = ucfirst("$row_step[state]");
/*
*/
		echo "<tr>";
		echo "<td>$row_step[ucid].$row_step[usid]</td>";
		echo "<td>$row_step[name]</td>";
		echo "<td>$row_step[description]</td>"; 

?>

		<form name='form-p<?php echo "$row_step[usid]";?>' method="post" action='test-log'> 
			<input type="hidden" name="app" value='<?php echo "$app";?>' />
			<input type="hidden" name="bid" value='<?php echo "$bid";?>' />
			<input type="hidden" name="dte" value='<?php echo "$dte";?>' />
			<input type="hidden" name="tid" value='<?php echo "$tids";?>' />
			<input type="hidden" name="ucid" value='<?php echo "$row_step[ucid]";?>' />
			<input type="hidden" name="usid" value='<?php echo "$row_step[usid]";?>' />
		</form>	

		<td>
				<a style="cursor:pointer;" id='$ucs' title='Test Step: <?php echo "$row_step[usid]";?>' 
					onclick="document.forms['form-p<?php echo "$row_step[usid]";?>'].submit();">
					<div class='dlog'>Click here for Detailed LOG..</div> </a>
		</td>

<?php
		
		echo "<td><div class='$bgcs' align='center'>$rstatus</div></td>";
		echo "<td><div class='$bgce' align='center'>$rstate</div></td>";
		echo "<td>$row_step[start]</td>";
		echo "<td>$row_step[end]</td>";
		echo "</tr>";

		}
?>
		
		</table>
	</div>
	
<?php
	}
?>

<?php 
	include 'go-back.php'; 
?>	

<?php
	include 'bs-xyz.php';
?>
