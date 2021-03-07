<?php
        /*
        ** Copyright (c) 2018 Cisco 
        **
        ** Name: bs-vm5.php
        **
        ** Author: Pradeep Iyengar ( psampath@cisco.com )
        **         Oct 2018
        */
?>

	<li>
		<a data-toggle="collapse" data-target="#demovm5" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> TOOLS <i class="fa fa-fw fa-caret-down"></i></a>
		
		<ul id="demovm5" class="collapse">

			<li>
				<form name="form-julio" method="post" action='date-picker'> 
				<input type="hidden" name="bid" value='<?php //echo "$row_display_julio[build]";?>' />
				<input type="hidden" name="app" value='JULIO' />
				</form>								
				<a onclick="document.forms['form-julio'].submit();" style="cursor:pointer;" >
				Julio</a>
			</li>

		</ul>
	
	</li>

