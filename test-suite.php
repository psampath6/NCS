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
	include 'bs-abc.php';
?>

<?php
	include 'go-back.php';
?>

<style>
</style>

<?php
/*
if ($_POST['date'] == "")
{
	echo "<script>window.location.replace('/');</script>";
}
*/

// echo $_POST['bid'];

if (isset($_POST['dte']))
{
	$bid = $_POST['bid'];
	$app = $_POST['app'];
	$tid = $_POST['tid'];
	$dte = $_POST['dte'];
}
else
{
	$bid = "";
	$app = "";
	$dte = "";
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
	echo "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;";
//	echo "<button style='cursor:default;' class='btn btn-secondary'>Build : ".$tid."</button>";

	echo "<br><br>";

	echo "&nbsp;&nbsp; Test Suites : ";
	echo "<br>";

	$result_test = mysqli_query($dbc, "SELECT * FROM test INNER JOIN
				(SELECT MAX(tid) AS tid FROM test
				WHERE testdrive = 0 && build = '$bid' && application = '$app' && tid = '$tid' && MID(start,1,10) = '$dte'
				GROUP BY name,application,build ORDER BY tid ASC)
				t2 ON test.tid = t2.tid");

	if ( ! mysqli_num_rows($result_test) )
	{
		echo "<br>";
		echo "<pre> <h4> <i> No <b>Tests</b> found for the selected Date ... </i> </h4> </pre>";
		echo "<br>";
		echo "<div style='height:120px;'></div>";
	}
else
	{

?>

	<div class='table-responsive table'>

		<table class='table-hover table-striped' width='100%' border='0'>
			<tr>
				<th scope='col'><div align='center'>Date</div></th>
				<th scope='col'><div align='center'>Name</div></th>
				<th scope='col'><div align='center'>Description</div></th>
				<th scope='col'><div align='center'>State</div></th>
				<th scope='col'><div align='center'>Owner</div></th>
			</tr>

<?php
		while($row_test = mysqli_fetch_array($result_test))
		{
			if ("$row_test[state]" == "completed") $bgclr = 'completed';
			if ("$row_test[state]" == "running")	 $bgclr = 'running';
	/*
	*/
			$rstate = ucfirst("$row_test[state]");
?>

			<form name='form-s<?php echo "$row_test[tid]";?>' method="post" action='test-case'>
				<input type="hidden" name="app" value='<?php echo "$app";?>' />
				<input type="hidden" name="bid" value='<?php echo "$bid";?>' />
				<input type="hidden" name="dte" value='<?php echo "$dte";?>' />
				<input type="hidden" name="tid" value='<?php echo "$row_test[tid]";?>' />
			</form>

			<tr>

				<td>
						<a onclick="document.forms['form-s<?php echo "$row_test[tid]";?>'].submit();"
								style="cursor:pointer;" ><?php echo "$row_test[start]";?></a>
				</td>

				<td>
						<a onclick="document.forms['form-s<?php echo "$row_test[tid]";?>'].submit();"
								style="cursor:pointer;" ><?php echo "$row_test[name]";?></a>
				</td>

				<td>
						<a onclick="document.forms['form-s<?php echo "$row_test[tid]";?>'].submit();"
								style="cursor:pointer;" ><?php echo "$row_test[description]";?></a>
				</td>

				<td>
						<a onclick="document.forms['form-s<?php echo "$row_test[tid]";?>'].submit();"
							class='<?php echo "$bgclr";?>' style="cursor:pointer;" ><?php echo "$rstate";?></a>
				</td>

				<td>
						<a onclick="document.forms['form-s<?php echo "$row_test[tid]";?>'].submit();"
								style="cursor:pointer;" ><?php echo "$row_test[tester]";?></a>
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

<!--
-->
