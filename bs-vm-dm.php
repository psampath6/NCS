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
?>

	<li style="border-top:1px solid #333; " >
		<a data-toggle="collapse" data-target="#demovm2" style="cursor:pointer;" >
		<i class="fa fa-fw fa-arrows-v"></i> L2L3 <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm2" class="collapse">

			<li>
				<form name="form-alchemy" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_alchemy[build]";?>' />
					<input type="hidden" name="app" value='ALCHEMY' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-alchemy'].submit();" style="cursor:pointer;" >
				GNMI on L2L3 Profile</a>
			</li>


			<li>
				<form name="form-cobalt-api" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_api[build]";?>' />
					<input type="hidden" name="app" value='COBALT_API' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-cobalt-api'].submit();" style="cursor:pointer;" >
				Rest API on L2L3 Profile</a>
			</li>

			<li>
				<form name="form-cobalt-ui" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_ui[build]";?>' />
					<input type="hidden" name="app" value='COBALT_UI' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-cobalt-ui'].submit();" style="cursor:pointer;" >
				Netconf on L2L3 Profile</a>
			</li>

		</ul>
	</li>



<!--
<style>
</style>
-->
<!--
-->

<?php
/*
*/
?>
