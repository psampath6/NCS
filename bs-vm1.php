<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm1.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>
<!--
-->
<?php

        $result_display_advantage = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'ADVANTAGE'
                                                                        ORDER BY start DESC");
        $row_display_advantage = mysqli_fetch_array($result_display_advantage) ;

        $result_display_cap = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'CAP'
                                                                        ORDER BY start DESC");
        $row_display_cap = mysqli_fetch_array($result_display_cap) ;

        $result_display_ctt = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'CTT'
                                                                        ORDER BY start DESC");
        $row_display_ctt = mysqli_fetch_array($result_display_ctt) ;

        $result_display_extranet = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'EXTRANET'
                                                                        ORDER BY start DESC");
        $row_display_extranet = mysqli_fetch_array($result_display_extranet) ;

        $result_display_guardian3 = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'GUARDIAN3'
                                                                        ORDER BY start DESC");
        $row_display_guardian3 = mysqli_fetch_array($result_display_guardian3) ;

        $result_display_zisa = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'ZISA'
                                                                        ORDER BY start DESC");
        $row_display_zisa = mysqli_fetch_array($result_display_zisa) ;

        $result_mobile_direct = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'MOBILE' && application = 'MOBILE_DIRECT'
                                                                        ORDER BY start DESC");
        $row_mobile_direct = mysqli_fetch_array($result_mobile_direct) ;

        $result_display_workbench = mysqli_query($con, "SELECT * FROM builds
                                                                        WHERE platform = 'DISPLAY' && application = 'WORKBENCH'
                                                                        ORDER BY start DESC");
        $row_display_workbench = mysqli_fetch_array($result_display_workbench) ;
?>

	<li>
		<a data-toggle="collapse" data-target="#demovm1" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> DISPLAY_DIRECT <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm1" class="collapse">

			<li>
				<form name="form-advantage" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_advantage[build]";?>' />
					<input type="hidden" name="app" value='ADVANTAGE' />
				</form>								
				<a onclick="document.forms['form-advantage'].submit();" style="cursor:pointer;" >
					AdVantage</a>
			</li>
			
			<li>
				<form name="form-cap" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_cap[build]";?>' />
					<input type="hidden" name="app" value='CAP' />
				</form>								
				<a onclick="document.forms['form-cap'].submit();" style="cursor:pointer;" >
					Client Access Portal</a>
			</li>

			<li>
				<form name="form-ctt" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_ctt[build]";?>' />
					<input type="hidden" name="app" value='CTT' />
				</form>								
				<a onclick="document.forms['form-ctt'].submit();" style="cursor:pointer;" >
					Creatives Test Tool</a>
			</li>

			<li>
				<form name="form-extranet" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_extranet[build]";?>' />
					<input type="hidden" name="app" value='EXTRANET' />
				</form>								
				<a onclick="document.forms['form-extranet'].submit();" style="cursor:pointer;" >
					Extranet</a>
			</li>
			
			<li>
				<form name="form-guardian3" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_guardian3[build]";?>' />
					<input type="hidden" name="app" value='GUARDIAN3' />
				</form>								
				<a onclick="document.forms['form-guardian3'].submit();" style="cursor:pointer;" >
					Guardian3</a>
			</li>
			
			<li>
				<form name="form-mobile-direct" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_mobile_direct[build]";?>' />
					<input type="hidden" name="app" value='MOBILE_DIRECT' />
				</form>								
				<a onclick="document.forms['form-mobile-direct'].submit();" style="cursor:pointer;" >
					Mobile for Direct</a>
			</li>
			
			<li>
				<form name="form-workbench" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_workbench[build]";?>' />
					<input type="hidden" name="app" value='Workbench' />
				</form>								
				<a onclick="document.forms['form-workbench'].submit();" style="cursor:pointer;" >
					Workbench</a>
			</li>
			
			<li>
				<form name="form-zisa" method="post" action='date-picker'> 
					<input type="hidden" name="bid" value='<?php echo "$row_display_zisa[build]";?>' />
					<input type="hidden" name="app" value='ZISA' />
				</form>								
				<a onclick="document.forms['form-zisa'].submit();" style="cursor:pointer;" >
					Zisa</a>
			</li>
			
		</ul>
	</li>
