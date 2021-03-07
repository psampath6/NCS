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

	$result_display_campaign = mysqli_query($con, "SELECT * FROM builds
									WHERE platform = 'DISPLAY' && application = 'CAMPAIGN_API'
									ORDER BY start DESC");
	$row_display_campaign = mysqli_fetch_array($result_display_campaign) ;

?>

	<li style="border-top:1px solid #333; " >
		<a data-toggle="collapse" data-target="#demovm4" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> SERVICES <i class="fa fa-fw fa-caret-down"></i></a>

		<ul id="demovm4" class="collapse">

			<li>
				<form name="form-campaign" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_campaign[build]";?>' />
					<input type="hidden" name="app" value='CAMPAIGN_API' />
					<input type="hidden" name="dte" />
				</form>
				<a onclick="document.forms['form-campaign'].submit();" style="cursor:pointer;" >
				Campaign / Advertiser API</a>
			</li>

		</ul>

	</li>
