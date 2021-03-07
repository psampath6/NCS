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

	<li style="border-top:1px solid #333; " >
		<a data-toggle="collapse" data-target="#demovm5" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> TOOLS <i class="fa fa-fw fa-caret-down"></i></a>

		<ul id="demovm5" class="collapse">

			<li>
				<form name="form-julio" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php //echo "$row_display_julio[build]";?>' />
					<input type="hidden" name="app" value='JULIO' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-julio'].submit();" style="cursor:pointer;" >
				Julio</a>
			</li>

		</ul>

	</li>

	<li>
	<a style="border-top:1px solid #333; " > </a>
	</li>
