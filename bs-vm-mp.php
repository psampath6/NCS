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
		<a data-toggle="collapse" data-target="#demovm3" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> MEDIAPLEX <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm3" class="collapse">

			<li>
				<form name="form-adserver" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_adserver[build]";?>' />
					<input type="hidden" name="app" value='ADSERVER' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-adserver'].submit();" style="cursor:pointer;" >
					AdServer</a>
			</li>

			<li>
				<form name="form-adserver-ui" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_adserver_ui[build]";?>' />
					<input type="hidden" name="app" value='ADSERVER_UI' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-adserver-ui'].submit();" style="cursor:pointer;" >
					AdServer UI</a>
			</li>

			<li>
				<form name="form-contextual" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_video_contextual[build]";?>' />
					<input type="hidden" name="app" value='CONTEXTUAL' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-contextual'].submit();" style="cursor:pointer;" >
					Contextual</a>
			</li>

			<li>
				<form name="form-forecast-engine" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_forecast[build]";?>' />
					<input type="hidden" name="app" value='FORECAST' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-forecast-engine'].submit();" style="cursor:pointer;" >
					Forecast Engine</a>
			</li>
			<!--
			<li>
				<form name="form-guide" method="post" action='date-picker'>
					<input type="hidden" name="bid" value='<?php //echo "$row_display_guide[build]";?>' />
					<input type="hidden" name="app" value='Guide' />
				</form>
				<a onclick="document.forms['form-guide'].submit();" style="cursor:pointer;" >
					Guide</a>
			</li>
			-->

		</ul>
	</li>
