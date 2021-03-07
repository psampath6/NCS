<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm-db.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

<style>
#vm-db {
	color: #222; /* color:#DAA520; goldenrod */
}
#vm-db:hover {
	color: #FFD700; /* color:#FFD700; gold */
}
/*
*/
</style>

<?php
/* 

$result_vmdb = mysqli_query($con, 
"SELECT DISTINCT application, build FROM test WHERE MID(start,1,10) = '$dte' ORDER BY application ASC");
*/
$result_vmdb = mysqli_query($con, 
"SELECT application, build,tid FROM test WHERE MID(start,1,10) = '$dte' ORDER BY tid DESC");

	while($row_vmdb = mysqli_fetch_array($result_vmdb))
	{
?>
		<li style="">
			<form name="form<?php echo "$row_vmdb[application]$row_vmdb[build]$row_vmdb[tid]";?>" method="post" action='test-suite'> 
				<input type="hidden" name="bid" value='<?php echo "$row_vmdb[build]";?>' />
				<input type="hidden" name="app" value='<?php echo "$row_vmdb[application]";?>' />
				<input type="hidden" name="tid" value='<?php echo "$row_vmdb[tid]";?>' />
				<input type="hidden" name="dte"  />
			</form>	
			
			<a id="vm-db" style="border-top:1px solid #444; cursor:pointer; " 
				title='<?php echo "Application : $row_vmdb[application]"."&nbsp;\n"."( Build : $row_vmdb[build] )";?>' 
				onclick="document.forms['form<?php echo "$row_vmdb[application]$row_vmdb[build]$row_vmdb[tid]";?>'].submit();" > 
				<div>
					<i class="fa fa-fw fa-arrow-circle-right">&nbsp;</i> 
					<b>
					<?php echo "$row_vmdb[application]"."<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
											"<span style='font-size:11px'>($row_vmdb[build])</span>";?>
					</b>
				</div>
			</a>
		</li>
<?php
	}
/*
*/

$rowcnt_vmdb = mysqli_num_rows($result_vmdb);
if ($rowcnt_vmdb == 0)
{
?>
	<li class="">
		<a id="vm-db" 
		style="border-top:1px solid #444; border-bottom:1px solid #444; cursor:default; font-size:11px;">
			<b>No Jobs found on <?php echo "$dte"; ?> </b> </a>
	</li>
<?php
}
else
{	
?>
	<li class="" style="">
		<a id="vm-db" style="border-top:1px solid #444; " ></a>
	</li>
<?php
}
?>

<script type="text/javascript">
	$('input[name=dte]').val($('#date').val());

	$(document).ready(function(){
		$('#date').blur(function() {
				$('input[name=dte]').val($('#date').val());
		});
	});

	$(document).ready(function(){
		$('#date').change(function() {
				$('input[name=dte]').val($('#date').val());
		});
	});

	$(document).ready(function(){
		$('#date').focus(function() {
				$('input[name=dte]').val($('#date').val());
		});
	});
</script>

<!--
-->
