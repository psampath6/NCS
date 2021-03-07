<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm2.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

<?php

	$result_display_alchemy = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'ALCHEMY' 
									ORDER BY start DESC");
	$row_display_alchemy = mysqli_fetch_array($result_display_alchemy) ;  

	
	$result_display_cobalt_api = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'COBALT_API' 
									ORDER BY start DESC");
	$row_display_cobalt_api = mysqli_fetch_array($result_display_cobalt_api) ;  

	$result_display_cobalt_ui = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'COBALT_UI' 
									ORDER BY start DESC");
	$row_display_cobalt_ui = mysqli_fetch_array($result_display_cobalt_ui) ;  

	$result_display_pub_admin = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'PUB_ADMIN' 
									ORDER BY start DESC");
	$row_display_pub_admin = mysqli_fetch_array($result_display_pub_admin) ;  
	
	$result_display_pub_ui = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'PUB_UI' 
									ORDER BY start DESC");
	$row_display_pub_ui = mysqli_fetch_array($result_display_pub_ui) ;  

	$result_video_vbox = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'VIDEO' && application = 'VBOX' 
									ORDER BY start DESC");
	$row_video_vbox = mysqli_fetch_array($result_video_vbox) ;  

	$result_display_tag_manager = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'DISPLAY' && application = 'TAG_MANAGER' 
									ORDER BY start DESC");
	$row_display_tag_manager = mysqli_fetch_array($result_display_tag_manager) ;  

	$result_video_pvs = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'VIDEO' && application = 'PVS' 
									ORDER BY start DESC");
	$row_video_pvs = mysqli_fetch_array($result_video_pvs) ;  

	$result_video_cvus = mysqli_query($con, "SELECT * FROM builds 
									WHERE platform = 'VIDEO' && application = 'CVUS' 
									ORDER BY start DESC");
	$row_video_cvus = mysqli_fetch_array($result_video_cvus) ;  
?>

	<li>
		<a data-toggle="collapse" data-target="#demovm2" style="cursor:pointer;" >
		<i class="fa fa-fw fa-arrows-v"></i> DISPLAY_MEDIA <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm2" class="collapse">
		
			<li>
				<form name="form-alchemy" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_alchemy[build]";?>' />
				<input type="hidden" name="app" value='ALCHEMY' />
				</form>								
				<a onclick="document.forms['form-alchemy'].submit();" style="cursor:pointer;" >
				Alchemy</a>
			</li>


			<li>
				<form name="form-cobalt-api" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_api[build]";?>' />
				<input type="hidden" name="app" value='COBALT_API' />
				</form>								
				<a onclick="document.forms['form-cobalt-api'].submit();" style="cursor:pointer;" >
				Cobalt API</a>
			</li>
			
			<li>
				<form name="form-cobalt-ui" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_cobalt_ui[build]";?>' />
				<input type="hidden" name="app" value='COBALT_UI' />
				</form>								
				<a onclick="document.forms['form-cobalt-ui'].submit();" style="cursor:pointer;" >
				Cobalt UI</a>
			</li>

			<li>
				<form name="form-pub-admin" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_pub_admin[build]";?>' />
				<input type="hidden" name="app" value='PUB_ADMIN' />
				</form>								
				<a onclick="document.forms['form-pub-admin'].submit();" style="cursor:pointer;" >
				Pub Admin</a>
			</li>
			
			<li>
				<form name="form-pub-ui" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_pub_ui[build]";?>' />
				<input type="hidden" name="app" value='PUB_UI' />
				</form>								
				<a onclick="document.forms['form-pub-ui'].submit();" style="cursor:pointer;" >
				Pub UI</a>
			</li>

			
			<li>
				<form name="form-tag-manager" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_display_tag_manager[build]";?>' />
				<input type="hidden" name="app" value='TAG_MANAGER' />
				</form>								
				<a onclick="document.forms['form-tag-manager'].submit();" style="cursor:pointer;" >
				Tag Manager</a>
			</li>
			
			<li>
				<form name="form-cvus" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_video_cvus[build]";?>' />
				<input type="hidden" name="app" value='CVUS' />
				</form>								
				<a onclick="document.forms['form-cvus'].submit();" style="cursor:pointer;" >
				Creative Video Upload Ser.</a>
			</li>
			
			<li>
				<form name="form-pvs" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_video_pvs[build]";?>' />
				<input type="hidden" name="app" value='PVS' />
				</form>								
				<a onclick="document.forms['form-pvs'].submit();" style="cursor:pointer;" >
				Personalised Video Ser.</a>
			</li>
			
			<li>
				<form name="form-vbox" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php echo "$row_video_vbox[build]";?>' />
				<input type="hidden" name="app" value='VBOX' />
				</form>								
				<a onclick="document.forms['form-vbox'].submit();" style="cursor:pointer;" >
				VBOX</a>
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

