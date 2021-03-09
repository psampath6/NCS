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
#error_reporting(E_ALL);

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
	$dte = $_POST['dte'];
}
else
{
	$bid = "";
	$app = "";
	$dte = "";
}

	echo "<br><br>";

	echo "&nbsp;&nbsp; Triggers : ";
	echo "<br>";

	$result_test = mysqli_query($dbc, "SELECT * FROM triggers where Application='GNMI-MSDC1'");

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
				<th scope='col'><div align='center'>Number</div></th>
				<th scope='col'><div align='center'>Application</div></th>
				<th scope='col'><div align='center'>Trigger</div></th>
			</tr>

<?php
		while($row_test = mysqli_fetch_array($result_test))
		{
			//if ("$row_test[state]" == "completed") $bgclr = 'completed';
			//if ("$row_test[state]" == "running")	 $bgclr = 'running';
	/*
	*/
			//$rstate = ucfirst("$row_test[state]");
?>

			<form name='form-s<?php echo "$row_test[tid]";?>' method="post" action='test-case'>
				<input type="hidden" name="app" value='<?php echo "$app";?>' />
				<input type="hidden" name="bid" value='<?php echo "$bid";?>' />
				<input type="hidden" name="dte" value='<?php echo "$dte";?>' />
				<input type="hidden" name="tid" value='<?php echo "$row_test[tid]";?>' />
			</form>

			<tr>

				<td>
                                                <?php echo "$row_test[Number]";?>
				</td>

				<td>
                                                <?php echo "$row_test[Application]";?>
				</td>

				<td>
                                                <?php echo "$row_test[Name]";?>
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
