<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm3.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>
<?php

        $result_display_adserver = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'ADSERVER'
                                                                        ORDER BY start DESC");
        $row_display_adserver = mysqli_fetch_array($result_display_adserver) ;

        $result_display_adserver_ui = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'ADSERVER_UI'
                                                                        ORDER BY start DESC");
        $row_display_adserver_ui = mysqli_fetch_array($result_display_adserver_ui) ;

        $result_video_contextual = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'VIDEO' && application = 'CONTEXTUAL'
                                                                        ORDER BY start DESC");
        $row_video_contextual = mysqli_fetch_array($result_video_contextual) ;

        $result_video_contextual = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'VIDEO' && application = 'CONTEXTUAL'
                                                                        ORDER BY start DESC");
        $row_video_contextual = mysqli_fetch_array($result_video_contextual) ;

        $result_display_forecast = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'FORECAST'
                                                                        ORDER BY start DESC");
        $row_display_forecast = mysqli_fetch_array($result_display_forecast) ;


?>
	<li>
		<a data-toggle="collapse" data-target="#demovm3" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> MEDIAPLEX <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm3" class="collapse">

			<li>
				<form name="form-adserver" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_adserver[build]";?>' />
					<input type="hidden" name="app" value='AdServer' />
				</form>								
				<a onclick="document.forms['form-adserver'].submit();" style="cursor:pointer;" >
					AdServer</a>
			</li>
			
			<li>
				<form name="form-adserver-ui" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_adserver_ui[build]";?>' />
					<input type="hidden" name="app" value='AdServer_UI' />
				</form>								
				<a onclick="document.forms['form-adserver-ui'].submit();" style="cursor:pointer;" >
					AdServer UI</a>
			</li>
			
			<li>
				<form name="form-contextual" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_video_contextual[build]";?>' />
					<input type="hidden" name="app" value='Contextual' />
				</form>								
				<a onclick="document.forms['form-contextual'].submit();" style="cursor:pointer;" >
					Contextual</a>
			</li>
			
			<li>
				<form name="form-forecast-engine" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_forecast[build]";?>' />
					<input type="hidden" name="app" value='FORECAST' />
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
