<?php
        /*
        ** Copyright (c) 2018 Cisco
        **
        ** Name: test-case.php
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

<style>
</style>

<?php 

if (isset($_POST['app']))
{
	$bid = $_POST['bid'];
	$app = $_POST['app'];
	$dte = $_POST['dte'];
	$tid = $_POST['tid'];
}
else
{
	$bid = "";
	$app = "";
	$dte = ""; 
	$tid = ""; 
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

	echo "&nbsp;&nbsp; Test Cases : ";
	echo "<br />";

//	echo "&nbsp;, &nbsp;";
//	echo "tid : ".$tid;

	$result_case = mysqli_query($dbc, "SELECT * FROM tcase WHERE tid = '$tid' ");

	if ( ! mysqli_num_rows($result_case) ) 
	{
		echo "<br>";
		echo "<pre> <h4> <i> No <b>Cases</b> found for the Test Scenario ... </i> </h4> </pre>"; 
		echo "<br>";
		echo "<div style='height:120px;'></div>";
	}
else
	{

?>

	<div class='table-responsive table'>
		<table class='table-hover table-striped' width='100%' border='0' valign='top'>
			<tr>
				<th scope='col'><div align='center'>TC ID</div></th>
				<th scope='col'><div align='center'>Name</div></th>
				<th scope='col'><div align='center'>Description</div></th>
				<th scope='col'><div align='center'>Status</div></th>
				<th scope='col'><div align='center'>State</div></th>
				<th scope='col'><div align='center'>Start Date</div></th>
				<th scope='col'><div align='center'>End Date</div></th>
			</tr>

<?php
	while($row_case = mysqli_fetch_array($result_case))
		{ 
			if ("$row_case[status]" == "pass") $bgcs = 'pass';
			if ("$row_case[status]" == "fail") $bgcs = 'fail';
			if ("$row_case[status]" == "fatal")	$bgcs = 'fatal';
			if ("$row_case[status]" == "untested")	$bgcs = 'untested';
			if ("$row_case[status]" == "unsupported")	$bgcs = 'unsupported';
			if ("$row_case[status]" == "invalid")	$bgcs = 'invalid';
			
			$rstatus = ucfirst("$row_case[status]");
			
			if ("$row_case[state]" == "completed") $bgce = 'completed';
			if ("$row_case[state]" == "running") $bgce = 'running';
	
			$rstate = ucfirst("$row_case[state]");

?>

			<form name='form-c<?php echo "$row_case[cid]";?>' method="post" action='test-step'> 
				<input type="hidden" name="app" value='<?php echo "$app";?>' />
				<input type="hidden" name="bid" value='<?php echo "$bid";?>' />
				<input type="hidden" name="dte" value='<?php echo "$dte";?>' />
				<input type="hidden" name="tid" value='<?php echo "$row_case[tid]";?>' />
				<input type="hidden" name="cid" value='<?php echo "$row_case[cid]";?>' />
			</form>	

			<tr>

				<td>
						<a style="cursor:pointer;" title='Test Step: <?php echo "$row_case[cid]";?>' 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$row_case[ucid]";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" title='Test Step: <?php echo "$row_case[tid]";?>' 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$row_case[name]";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" title='Test Step: <?php echo "$row_case[tid]";?>' 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$row_case[description]";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" class='<?php echo "$bgcs";?>' 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$rstatus";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" class='<?php echo "$bgce";?>' 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$rstate";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$row_case[start]";?></a>
				</td>

				<td>
						<a style="cursor:pointer;" 
							onclick="document.forms['form-c<?php echo "$row_case[cid]";?>'].submit();">
							<?php echo "$row_case[end]";?></a>
				</td>
			
			</tr>

<?php
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

