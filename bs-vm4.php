<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm4.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

<?php

	$result_display_campaign = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'CAMPAIGN_API' 
									ORDER BY start DESC");
	$row_display_campaign = mysqli_fetch_array($result_display_campaign) ;  

?>

	<li>
		<a data-toggle="collapse" data-target="#demovm4" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> SERVICES <i class="fa fa-fw fa-caret-down"></i></a>
		
		<ul id="demovm4" class="collapse">

			<li>
				<form name="form-campaign" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_campaign[build]";?>' />
				<input type="hidden" name="app" value='CAMPAIGN_API' />
				</form>								
				<a onclick="document.forms['form-campaign'].submit();" style="cursor:pointer;" >
				Campaign / Advertiser API</a>
			</li>

		</ul>
	
	</li>

