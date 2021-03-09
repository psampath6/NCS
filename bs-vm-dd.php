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
<!--
-->

	<li style="border-top:1px solid #333; " >

		<a data-toggle="collapse" data-target="#demovm1" style="cursor:pointer;" >
			<i class="fa fa-fw fa-arrows-v"></i> MSDC <i class="fa fa-fw fa-caret-down"></i></a>
		<ul id="demovm1" class="collapse">
				<!--  -->

			<li>
				<form name="form-advantage" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_advantage[build]";?>' />
					<input type="hidden" name="app" value='GNMI-MSDC1' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-advantage'].submit();" style="cursor:pointer;" >
					GNMI-MSDC1</a>
			</li>

			<li>
				<form name="form-cap" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_cap[build]";?>' />
					<input type="hidden" name="app" value='REST-MSDC1' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-cap'].submit();" style="cursor:pointer;" >
					REST-MSDC1</a>
			</li>

			<li>
				<form name="form-ctt" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_ctt[build]";?>' />
					<input type="hidden" name="app" value='NETCONF-MSDC1' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-ctt'].submit();" style="cursor:pointer;" >
					NETCONF-MSDC1</a>
			</li>

			<li>
				<form name="form-extranet" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_extranet[build]";?>' />
					<input type="hidden" name="app" value='EXTRANET' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-extranet'].submit();" style="cursor:pointer;" >
					GNMI-MSDC2</a>
			</li>

			<li>
				<form name="form-guardian3" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_display_guardian3[build]";?>' />
					<input type="hidden" name="app" value='GUARDIAN3' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-guardian3'].submit();" style="cursor:pointer;" >
					REST-MSDC2</a>
			</li>

			<li>
				<form name="form-mobile-direct" method="post" action="test-suite">
					<input type="hidden" name="bid" value='<?php echo "$row_mobile_direct[build]";?>' />
					<input type="hidden" name="app" value='MOBILE_DIRECT' />
					<input type="hidden" name="dte"  />
				</form>
				<a onclick="document.forms['form-mobile-direct'].submit();" style="cursor:pointer;" >
					NETCONF-MSDC2</a>
			</li>


		</ul>
	</li>


<!--
-->
